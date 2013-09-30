<?php

/**
 * Handle file uploads via XMLHttpRequest
 */
class qqUploadedFileXhr{
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    function save($path){
        $input = fopen("php://input", "r");
        $temp = tmpfile();
        $realSize = stream_copy_to_stream($input, $temp);
        fclose($input);

        if ($realSize != $this->getSize()){
            return false;
        };

        $target = fopen($path, "w");
        fseek($temp, 0, SEEK_SET);
        stream_copy_to_stream($temp, $target);
        fclose($target);

        return true;
    }

    function getName(){
        return $_GET['qqfile'];
    }

    function getSize(){
        if(isset($_SERVER["CONTENT_LENGTH"])){
            return (int)$_SERVER["CONTENT_LENGTH"];
        }else{
            throw new Exception('Getting content length is not supported.');
        };
    }
}

/**
 * Handle file uploads via regular form post (uses the $_FILES array)
 */
class qqUploadedFileForm{
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    function save($path){
        if(!move_uploaded_file($_FILES['qqfile']['tmp_name'], $path)){
            return false;
        };

        return true;
    }

    function getName(){
        return $_FILES['qqfile']['name'];
    }

    function getSize(){
        return $_FILES['qqfile']['size'];
    }
}

class qqFileUploader{
    private
        $allowedExtensions = array(),
        $sizeLimit = 10485760,
        $file,
        $type,
        $relative_id,
        $relative_table,
        $form_item,
        $mode,
        $table,
        $copies_params_str;

    function __construct(array $allowedExtensions = array(), $sizeLimit = 10485760, $type, $relative_id, $relative_table, $form_item, $mode, $copies_params_str){
        $allowedExtensions = array_map("strtolower", $allowedExtensions);

        $this->images = new Images();

        $this->type = $type;
        $this->relative_id = $relative_id;
        $this->relative_table = $relative_table;
        $this->form_item = $form_item;

        $this->allowedExtensions = $allowedExtensions;
        $this->sizeLimit = $sizeLimit;

        $this->copies_params_str = $copies_params_str;

        $this->checkServerSettings();

        if(isset($_GET['qqfile'])){
            $this->file = new qqUploadedFileXhr();
        }elseif(isset($_FILES['qqfile'])){
            $this->file = new qqUploadedFileForm();
        }else{
            $this->file = false;
        };

        $this->mode = $mode;

        if($mode == 'images'){
            $this->table = 'images';
        }else{
            $this->table = 'files';
        };
    }

    private function createThumbnail($dir, $filename, $ext){
        $source         = $dir . $filename . '.' . $ext;
        $thumb_big      = $dir . '._thumb_' . $filename . '.' . $ext;
        $thumb_small    = $dir . '._thumb_list_' . $filename . '.' . $ext;

        $this->images->cropThumb($source, $thumb_big);
        $this->images->resizeThumb($thumb_big, $thumb_big, 120, 120);
        $this->images->resizeThumb($thumb_big, $thumb_small, 30, 30);
    }

    private function createCopies($dir, $filename, $ext){
        if($this->copies_params_str != ''){
            foreach(explode(';', $this->copies_params_str) as $item){
                $item_a = explode(',', $item);

                $this->images->sourceFile = $dir . $filename . '.' . $ext;
                $this->images->targetFile = $dir . $filename . '_' . $item_a[2] . '.' . $ext;

                switch($item_a[3]){
                    case '2' : {
                        $this->images->resizeToWidth = intval($item_a[0]);
                    } break;

                    case '3' : {
                        $this->images->resizeToHeight = intval($item_a[1]);
                    } break;

                    case '4' : {
                        $this->images->resizeToHeight = intval($item_a[0]);
                    } break;

                    default : {
                    $this->images->resizeToWidth = intval($item_a[0]);
                    $this->images->resizeToHeight = intval($item_a[1]);
                    } break;
                }

                $this->images->maintainAspectRatio = true;
                $this->images->resizeIfSmaller = false;
                $this->images->resizeIfGreater = true;
                $this->images->jpegOutputQuality = 100;
                $this->images->chmodValue = 777;

                $this->images->resize();

                if($item_a[3] == '4'){
                    $this->images->cropThumb($this->images->targetFile, $this->images->targetFile);
                }
            };
        };
    }

    private function checkServerSettings(){
        $postSize = $this->sizeLimit;
        $uploadSize = $this->sizeLimit;

        if($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit){
            $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';
            die("{'error':'increase post_max_size and upload_max_filesize to $size'}");
        };
    }

    private function toBytes($str){
        $val = trim($str);
        $last = strtolower($str[strlen($str)-1]);

        switch($last){
            case 'g': $val *= 1024;
            case 'm': $val *= 1024;
            case 'k': $val *= 1024;
        };

        return $val;
    }

    private function recountFiles(){
        $sql = mysql_query("
                SELECT
                    count(*) AS `count`
                FROM
                    `".DB::quote($this->table)."`
                WHERE
                    `type`              = ".intval($this->type)." &&
                    `relative_id`       = ".intval($this->relative_id)." &&
                    `relative_table`    = '".DB::quote($this->relative_table)."' &&
                    `form_item`         = '".DB::quote($this->form_item)."'
            ");

        $count = mysql_fetch_row($sql);

        mysql_query("
                UPDATE
                    `".DB::quote($this->relative_table)."`
                SET
                    `".DB::quote($this->form_item)."` = ".intval($count[0])."
                WHERE
                    `id` = ".intval($this->relative_id)."
            ");
    }

    private function createRow($uploadDirectory, $filename, $ext, $size){
        $date = date('Y-m-d H:i:s');

        if($this->mode == 'images'){
            $file = $_SERVER['DOCUMENT_ROOT'].$uploadDirectory.$filename.'.'.$ext;
            $dimensions = getimagesize($file);

            $query = "
					INSERT INTO `".DB::quote($this->table)."` (
						`name`,
						`extension`,
						`path`,
						`type`,
						`relative_id`,
						`relative_table`,
						`form_item`,
						`date`,
						`size`,
						`width`,
						`height`
					) VALUES (
						'".DB::quote($filename)."',
						'".DB::quote($ext)."',
						'".DB::quote($uploadDirectory)."',
						".intval($this->type).",
						".intval($this->relative_id).",
						'".DB::quote($this->relative_table)."',
						'".DB::quote($this->form_item)."',
						'".DB::quote($date)."',
						".intval($size).",
						".intval($dimensions[0]).",
						".intval($dimensions[1])."
					);
				";

            mysql_query($query);
            $id = mysql_insert_id();

            mysql_query("
                    UPDATE
                        `".DB::quote($this->table)."`
                    SET
                        `sort` = ".intval($id)."
                    WHERE
                        `id` = ".intval($id)."
                ");

        }else{
            $query = "
					INSERT INTO `".DB::quote($this->table)."` (
						`name`,
						`extension`,
						`path`,
						`type`,
						`relative_id`,
						`relative_table`,
						`form_item`,
						`date`,
						`size`
					) VALUES (
						'".DB::quote($filename)."',
						'".DB::quote($ext)."',
						'".DB::quote($uploadDirectory)."',
						".intval($this->type).",
						".intval($this->relative_id).",
						'".DB::quote($this->relative_table)."',
						'".DB::quote($this->form_item)."',
						'".DB::quote($date)."',
						".intval($size)."
					);
				";

            mysql_query($query);
        };

        $this->recountFiles();
    }

    /**
     * Returns array('success'=>true) or array('error'=>'error message')
     */
    function handleUpload($uploadDirectory, $replaceOldFile = false){
        if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/data/')){
            mkdir($_SERVER['DOCUMENT_ROOT'].'/data/', octdec(777), true);
        };

        $dir = $_SERVER['DOCUMENT_ROOT'].$uploadDirectory;

        if(!is_dir($dir)){
            mkdir($dir, octdec(777), true);
        };

        if(!is_writable($dir)){
            return array('error' => "Server error. Upload directory isn't writable.");
        };

        if(!$this->file){
            return array('error' => 'No files were uploaded.');
        };

        $size = $this->file->getSize();

        if($size == 0){
            return array('error' => 'File is empty');
        };

        if($size > $this->sizeLimit){
            return array('error' => 'File is too large');
        };

        $pathinfo = pathinfo($this->file->getName());
        $filename = Utilities::convertUrl($pathinfo['filename']);

        //$filename = md5(uniqid());
        $ext = strtolower($pathinfo['extension']);

        if($this->allowedExtensions && !in_array(strtolower($ext), $this->allowedExtensions)){
            $these = implode(', ', $this->allowedExtensions);
            return array('error' => 'File has an invalid extension, it should be one of '. $these . '.');
        };

        if(!$replaceOldFile){
            while (file_exists($dir . $filename . '.' . $ext)) {
                $filename .= '_'.rand(0, 9999);
            };
        };

        if($this->file->save($dir . $filename . '.' . $ext)){
            $images = array('gif','jpg','jpeg','png');

            if(in_array($ext, $images)){
                $this->createThumbnail($dir, $filename, $ext);
                $this->createCopies($dir, $filename, $ext);
            };

            $this->createRow($uploadDirectory, $filename, $ext, $size);

            return array('success' => true);
        }else{
            return array('error' => 'Could not save uploaded file.'.'The upload was cancelled, or server error encountered');
        }
    }
}

if($login->active){
    // list of valid extensions, ex. array("jpeg", "xml", "bmp")
    $allowedExtensions = array();

    // max file size in bytes
    $sizeLimit = 50 * 1024 * 1024;

    $uploader = new qqFileUploader(
        $allowedExtensions,
        $sizeLimit,
        $_GET['type'],
        $_GET['relative_id'],
        $_GET['relative_table'],
        $_GET['form_item'],
        $_GET['mode'],
        $_GET['copies_params_str']
    );

    if($_GET['mode'] == 'images'){
        $root_dir = 'images';
    }else{
        $root_dir = 'files';
    };

    $path = '/data/'.$root_dir.'/'.$_GET['relative_table'].'/'.$_GET['relative_id'].'/'.$_GET['folder'].'/';
    $path = preg_replace('#(?<!:)/{2,}#', '/', $path);

    $result = $uploader->handleUpload($path);

    // to pass data through iframe you will need to encode all html tags
    echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
};
?>