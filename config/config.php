;<? exit(); ?>

license = bsunqtodes hqegejhzss nvoxmlzmxn ymurvtvywr ubyrat1ved jm4rxkmgmm zqsijftkik rhzsmrrrko zwkrstp8xs tcqcvascrr 8ijlnalfre zs7evmvtnj jxxzjstwqs qxlvruyywr vexlxpsare xopg9razuu yokfjjltzz cynozyzrnu pqm7nhwlj4 z5pkopscqp porzsivohv bgnj9zlluu 8klqhpltdo jtpxsmlsrb jfwoyereua xqskzyrjyx 8i6k4qet5o kuozomqnd8 mbomrfvqha tlidtjnsps npqrpjosxw yizz7otv5p 5v5tcu93hi ekp5zmwoi7 fploydtljt jdpvnwuyvp tzzlqzxvzo xrmqye8ngr 7p84iud6 iougohxduw ntkjxhunln tlwsosyqqv xqkrlljfoc egmtmzyblp reigpcwnts wjiwoomjjp mktonqysrr qnvds77sfo 6txeywqrll om9rbdewzl qtwijwhzup zpyoxnonnr xmudxjqari 4i8a4xbgif jcgngzlebk uozsexxsht gnprzrocsw uepds8ulwr wfuu9cgthq uqlopsuztp amgtdzkqux irjuuim3jo xyprsuwxv8 pvuyzgro2z my9pjowqoy xwrpeoospw zvraxdi6zn rko6mal7uh qepeoeyhqj xm1vjxnpop mocvwu9scz o5yuwavfok n8ssjcmqyh lsywpiqypt yrvuusxylk glnwmsyrcs d6n4n9cwq7 sksgqlpyln iqzgjpmyoy nhqkqzsnwo cw8pavt389 searrchaca ysperfnusd jnjlhyuqts tvwpvwxwzs yoyr6xzn8r sffdgmzwap

[database]

;Сервер базы данных
db_server = 127.0.0.1

;Пользователь базы данных
db_user = root

;Пароль к базе
db_password = "secret"

;Имя базы
db_name = testcms

;Драйвер базы данных
db_driver = mysql

;Префикс для таблиц
db_prefix = ok_

;Кодировка базы данных
db_charset = UTF8MB4

;Режим SQL
db_sql_mode = "STRICT_TRANS_TABLES,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"

;Смещение часового пояса
;db_timezone = +04:00

[php]
error_reporting = E_ALL
php_charset = UTF8
php_locale_collate = ru_RU
php_locale_ctype = ru_RU
php_locale_monetary = ru_RU
php_locale_numeric = ru_RU
php_locale_time = ru_RU
;php_timezone = Europe/Moscow
debug_mode = false

[smarty]
smarty_compile_check = true
smarty_caching = false
smarty_cache_lifetime = 0
smarty_debugging = false
smarty_html_minify = false
smarty_security = true

[design]
debug_translation = false
scripts_defer = true

[images]
;Указываем какую библиотеку использовать для нарезки изображений. Варианты: Gregwar, Imagick или GD. Это имя класса адаптера
resize_adapter = Gregwar

;Директория общих изображений дизайна (лого, фавикон...)
design_images = files/images/

;Файл изображения с водяным знаком
watermark_file = backend/files/watermark/watermark.png

;Промо изображения
special_images_dir = files/special/

;Директория оригиналов и нарезок фоток товаров
original_images_dir = files/originals/products/
resized_images_dir = files/resized/products/

;Изображения оригиналов и нарезок фоток блога
original_blog_dir = files/originals/blog/
resized_blog_dir = files/resized/blog/

;Изображения оригиналов и нарезок фоток брендов
original_brands_dir = files/originals/brands/
resized_brands_dir = files/resized/brands/

;Изображения оригиналов и нарезок фоток категории
original_categories_dir = files/originals/categories/
resized_categories_dir = files/resized/categories/

;Изображения оригиналов и нарезок фоток доставки
original_deliveries_dir = files/originals/deliveries/
resized_deliveries_dir = files/resized/deliveries/

;Изображения оригиналов и нарезок фоток способов оплаты
original_payments_dir = files/originals/payments/
resized_payments_dir = files/resized/payments/

;Изображения баннеров
banners_images_dir = files/originals/slides/
resized_banners_images_dir = files/resized/slides/

; Папка изображений языков
lang_images_dir = files/originals/lang/
lang_resized_dir = files/resized/lang/
