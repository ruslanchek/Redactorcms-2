<?php

class Upload
{
    function __construct()
    {
        $this->images = new Images();
    }

    private function createThumbnail($dir, $filename, $ext)
    {
        $source = $dir . $filename . '.' . $ext;
        $targetFile = $dir . '._thumb_' . $filename . '.' . $ext;

        $this->images->cropThumb($source, $targetFile);
        $this->images->resizeThumb($targetFile, $targetFile, 120, 120);
    }

    //Main upload function
    public function upload($files, $login_active, $type = 'image')
    {
        if ($login_active) {
            if ($type == 'image') {
                $target_path = "/data/content/images/";
            } else {
                $target_path = "/data/content/files/";
            }

            if (!is_dir($_SERVER['DOCUMENT_ROOT'] . $target_path)) {
                mkdir($_SERVER['DOCUMENT_ROOT'] . $target_path, 0777, 1);
            }

            $file_temp = $files['file']['tmp_name'];
            $file_info = pathinfo($_SERVER['DOCUMENT_ROOT'] . $target_path . $files['file']['name']);
            $file_ext = mb_strtolower($file_info['extension']);
            $file_name = $file_info['filename'];

            if ($type == 'image') {
                if (
                    $file_ext != 'jpg' &&
                    $file_ext != 'jpeg' &&
                    $file_ext != 'png' &&
                    $file_ext != 'gif'
                ) {
                    die('wrong_file_format');
                }
            } else {
                switch ($file_ext) {
                    case 'php' :
                    {
                        die('wrong_file_format');
                    }
                        break;
                }
            }

            while (file_exists($_SERVER['DOCUMENT_ROOT'] . $target_path . $file_name . '.' . $file_ext)) {
                $file_name .= '_' . rand(0, 9999);
            }

            if (move_uploaded_file($file_temp, $_SERVER['DOCUMENT_ROOT'] . $target_path . $file_name . '.' . $file_ext)) {
                if ($type == 'image') {
                    $this->createThumbnail($_SERVER['DOCUMENT_ROOT'] . $target_path, $file_name, $file_ext);
                    $out = trim(Utilities::clearString($target_path . $file_name . '.' . $file_ext));

                    // displaying file
                    $array = array(
                        'filelink' => $out
                    );

                    echo stripslashes(json_encode($array));
                } else {
                    $array = array(
                        'filelink' => $target_path . $file_name . '.' . $file_ext,
                        'filename' => $file_name . '.' . $file_ext
                    );

                    echo stripslashes(json_encode($array));
                }
            }
        } else {
            die("Access denied!");
        }
    }
}