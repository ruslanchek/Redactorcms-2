<footer class="footer">
   <div class="limiter">
       <div class="row container">
           <div class="third">
               <a href="mailto:{$core->getConstant('common', 'main_email')|escape}" class="black-link">{$core->getConstant('common', 'main_email')}</a>
               <br>
               <strong>
                    <nobr>{$core->getConstant('common', 'main_phone')}</nobr>
               </strong>
               <br>
               <sup class="gray">{$core->getConstant('common', 'main_phone_suffix')}</sup>
               <br>
               <strong class="gray">Наш адрес</strong>
               <br>
               <address class="street-address">{$core->getConstant('common', 'corporate_address')}</address>
           </div>

           <div class="third">
               <div class="row">
                   <div class="half">
                       <div class="hav">
                           <a href="/" class="black-link">Главная</a><br>
                           <a href="/vacancies" class="black-link">Вакансии</a><br>
                           <a href="/contacts" class="black-link">Контакты</a><br>
                           <a href="/news" class="black-link">Новости и статьи</a><br>
                       </div>
                   </div>

                   <div class="half">
                       <div class="hav">
                           <a href="/metall" class="black-link">Металлопрокат</a><br>
                           <a href="/cable" class="black-link">Кабельная продукция</a><br>
                           <a href="/specials" class="black-link">Специальные предложения</a><br>
                       </div>
                   </div>
               </div>
           </div>

           <div class="third">
               <div class="right-part">
                   <a href="/" class="logo" title="{$core->getConstant('common', 'brand_name')|escape}"></a>
                   <br><br><br>
                   &copy; {$core->getConstant('common', 'start_year')}&ndash;{date('Y')}<br>
                   <strong>{$core->getConstant('common', 'brand_name')}</strong>
               </div>
           </div>
       </div>
   </div>
</footer>

{$core->getConstant('scripts', 'body_code')}