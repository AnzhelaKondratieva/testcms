<?php


namespace Okay\Admin\Controllers;


use Okay\Core\Languages;
use Okay\Entities\LanguagesEntity;

class LanguageAdmin extends IndexAdmin
{
    
    public function fetch(
        Languages $languagesCore,
        LanguagesEntity $languagesEntity
    ) {
        $langList = $languagesCore->getLangList();
        $updateLanguage = new \stdClass();
        
        /*Принимаем информацию о языке сайта*/
        if ($this->request->method('post')) {
            $updateLanguage->id      = $this->request->post('id', 'integer');
            $updateLanguage->enabled = $this->request->post('enabled', 'integer');
            
            if (empty($updateLanguage->id)) {
                $lang = $langList[$this->request->post('lang')];
                $updateLanguage->name    = $lang->name;
                $updateLanguage->label   = $lang->label;
                $updateLanguage->href_lang = $lang->href_lang;

                if (!$updateLanguage->label) {
                    $this->design->assign('message_error', 'label_empty');
                } elseif (($l = $languagesEntity->get((string)$updateLanguage->label)) && $l->id!=$updateLanguage->id) {
                    $this->design->assign('message_error', 'label_exists');
                } else {
                    /*Добавление/Обновление языка*/
                    $updateLanguage->id = $languagesEntity->add($updateLanguage);
                    $this->design->assign('message_success', 'added');
                }
            } else {

                $currentLangId = $languagesCore->getLangId();
                $otherLanguagesNames = $this->request->post('other_languages_names');
                foreach($otherLanguagesNames as $langId=>$langName) {
                    $languagesCore->setLangId($langId);
                    $languagesEntity->update($updateLanguage->id, ['name' => $langName]);
                }
                $languagesCore->setLangId($currentLangId);
                
                $this->design->assign('message_success', 'updated');
            }
        } else {
            $updateLanguage->id = $this->request->get('id', 'integer');
        }

        if (!empty($updateLanguage->id)) {
            $updateLanguage = $languagesEntity->getMultiLanguage((int)$updateLanguage->id);
        }
        $this->design->assign('lang_list', $langList);
        
        $this->design->assign('language', $updateLanguage);

        $languages = $languagesEntity->mappedBy('id')->find();
        $this->design->assign('languages', $languages);

        $this->response->setContent($this->design->fetch('language.tpl'));
    }
    
}
