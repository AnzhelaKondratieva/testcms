<?php


namespace Okay\Modules\OkayCMS\YandexXMLVendorModel\Init;


use Okay\Core\Modules\AbstractInit;
use Okay\Core\Modules\EntityField;
use Okay\Entities\BrandsEntity;
use Okay\Entities\CategoriesEntity;
use Okay\Entities\ProductsEntity;

class Init extends AbstractInit
{
    const TO_FEED_FIELD     = 'to__okaycms__yandex_xml_vendor_model';
    const NOT_TO_FEED_FIELD = 'not_to__okaycms__yandex_xml_vendor_model';
    const FEED_UPLOAD_FIELD = 'upload__okaycms__yandex_xml_vendor_model';

    public function install()
    {
        $this->setModuleType(MODULE_TYPE_XML);
        $this->setBackendMainController('YandexXmlAdmin');
    }
    
    public function init()
    {
        $field = new EntityField(CategoriesEntity::class, self::TO_FEED_FIELD);
        $field->setTypeTinyInt(1);
        $this->registerEntityField($field);
        
        $field = new EntityField(BrandsEntity::class, self::TO_FEED_FIELD);
        $field->setTypeTinyInt(1);
        $this->registerEntityField($field);
        
        $field = new EntityField(ProductsEntity::class, self::TO_FEED_FIELD);
        $field->setTypeTinyInt(1);
        $this->registerEntityField($field);
        
        $field = new EntityField(ProductsEntity::class, self::NOT_TO_FEED_FIELD);
        $field->setTypeTinyInt(1);
        $this->registerEntityField($field);
        
        $this->registerBackendController('YandexXmlAdmin');
        $this->addBackendControllerPermission('YandexXmlAdmin', self::FEED_UPLOAD_FIELD);
        
        $this->registerEntityFilter(
            ProductsEntity::class,
            'okaycms__yandex_xml_vendor_model__only',
            \Okay\Modules\OkayCMS\YandexXMLVendorModel\ExtendsEntities\ProductsEntity::class,
            'okaycms__yandex_xml_vendor_model__only'
        );
        
    }
    
}