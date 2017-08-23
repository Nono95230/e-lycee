<?php

namespace App\Providers;

use Collective\Html\HtmlServiceProvider;
//use App\Macros\FormMacros;

use Form;
use App;

class FormMacroServiceProvider extends HtmlServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();


        /*$this->app->singleton('form', function($app)
        {
            $form = new FormMacros($app['html'], $app['url'], $app['session.store']->token());
            return $form->setSessionStore($app['session.store']);
        });*/


        Form::macro('submitMacro', function( $action, $entity)
        {
            $field = '<div class="form-group">';
                $field .= '<button class="btn btn-success" type="submit"><i class="fa fa-paper-plane fa-fw"></i> '.config('fieldMacroHelpers.'.$entity.'.submit_'.$action).'</button>';
            $field .= '</div>';
          
          return $field;

        });

        Form::macro('publishMacro', function($type, $fieldName, $fieldEntity, $remember=null, $old=null )
        {

            if ($old === null) {//ACTION ADD
                if ($remember !== 'on') {
                    $statut='unpublished';
                } else {
                    $statut='published';
                }
            }
            else{//ACTION EDIT    
                $statut = $old;
            }

            if ($statut === "published") {
                $className = 'bootstrap-switch-on';
                $checked = 'checked=""';
            } else {
                $className = 'bootstrap-switch-off';
                $checked = '';
            }
            

            $field = '<div class="form-group">';
                $field .= '<label for="'.$fieldEntity.'_'.$fieldName.'">'.config('fieldMacroHelpers.'.$fieldEntity.'.'.$fieldName.'.label').'</label>';
                $field .='<div id="'.$fieldEntity.'_'.$fieldName.'" class="make-switch">';
                    $field .='<div class="bootstrap-switch-id-tete bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate '.$className.'">';
                        $field .='<div class="bootstrap-switch-container">';
                            $field .='<span class="bootstrap-switch-handle-on bootstrap-switch-success"><i class="fa fa-fw fa-check"></i></span>';
                            $field .='<span class="bootstrap-switch-label">Publié</span>';
                            $field .='<span class="bootstrap-switch-handle-off bootstrap-switch-danger"><i class="fa fa-fw fa-times"></i></span>';
                            $field .='<input name="'.$fieldName.'" '.$checked.' type="'.$type.'">';
                        $field .='</div>';
                    $field .='</div>';
                $field .='</div>';
            $field .= '</div>';
          
          return $field;

        });

        Form::macro('inputMacro', function( $type, $fieldName, $fieldEntity, $errors, $remember=null, $old=null )
        {
            if ( $old != null && $remember === null) {
                $remember = $old;
            }
            if ($remember===null) {
                $remember='';
            }

            $errorsClassName = '';
            $errorsContent = '';
            if( $errors->has($fieldName) ){
                $errorsClassName = 'has-feedback has-error';
                $errorsContent = $errors->first($fieldName);
            }

            $field = '<div class="form-group controls '.$errorsClassName.'">';
                $field .= '<label for="'.$fieldEntity.'_'.$fieldName.'" class="control-label inline">'.config('fieldMacroHelpers.'.$fieldEntity.'.'.$fieldName.'.label').'</label>';
                $field .= '<input type="'.$type.'" id="'.$fieldEntity.'_'.$fieldName.'" name="'.$fieldName.'" value="'.$remember.'" class="form-control" placeholder="'.config('fieldMacroHelpers.'.$fieldEntity.'.'.$fieldName.'.placeholder').'">';
                $field .= '<span class="help-block" style="height:20px;">'.$errorsContent.'</span>';
            $field .= '</div>';
            return $field;
        });

        Form::macro('textAreaMacro', function( $fieldName, $fieldEntity, $errors, $remember=null, $old=null )
        {
            if ( $old != null && $remember === null) {
                $remember = $old;
            }
            if ($remember===null) {
                $remember='';
            }

            $errorsClassName = '';
            $errorsContent = '';
            if( $errors->has($fieldName) ){
                $errorsClassName = 'has-feedback has-error';
                $errorsContent = $errors->first($fieldName);
            }

            $field = '<div class="form-group controls '.$errorsClassName.'">';
                $field .= '<label for="'.$fieldEntity.'_'.$fieldName.'" class="control-label">'.config('fieldMacroHelpers.'.$fieldEntity.'.'.$fieldName.'.label').'</label>';
                $field .= '<textarea id="'.$fieldEntity.'_'.$fieldName.'" name="'.$fieldName.'" class="form-control" rows="6" placeholder="'.config('fieldMacroHelpers.'.$fieldEntity.'.'.$fieldName.'.placeholder').'">'.$remember.'</textarea>';
                $field .= '<span class="help-block" style="min-height:20px;">'.$errorsContent.'</span>';
            $field .= '</div>';

            return $field;
        });

        Form::macro('fileMacro', function( $fieldName, $fieldEntity, $errors, $old = null)
        {

            $errorsClassName = '';
            $errorsContent = '';

            if( $errors->has($fieldName) ){
                $errorsClassName = 'has-feedback has-error';
                $errorsContent = $errors->first($fieldName);
            }

            $field = '<div class="form-group controls  '. $errorsClassName .'">';
                $field .= '<label for="'. $fieldEntity .'_'. $fieldName .'" class="control-label">'.config('fieldMacroHelpers.'.$fieldEntity.'.'.$fieldName.'.label').'</label>';

                if ( $old !== null ) {
                    $field .= '<div id="'. $fieldEntity .'_'. $fieldName .'_old_img" style="margin-bottom:12px;">';
                        $field .= '<img src="'. App::make('url')->to('/') .'/'. $fieldEntity .'s/images/'. $old .'" style="max-height:107px;margin-bottom:0px;" >';
                        $field .= '<p style="max-height:107px;max-width:300px;margin-bottom:0px;display:inline-block;vertical-align:top;padding:10px;">'.config('fieldMacroHelpers.'.$fieldEntity.'.'.$fieldName.'.old_advice').'</p>';
                    $field .= '</div>';
                }
                
                $field .= '<input  type="file" ';
                    $field .= '    class="input-ghost" ';
                    $field .= '    name="'. $fieldName .'" ';
                    $field .= '    style="visibility:hidden;height:0;" '; 
                    $field .= '    onchange="  $(this).next().find(\'input\').val( $(this).val().split(\'\\\\\').pop() );';
                $field .= '">';
                $field .= '<div id="'. $fieldEntity .'_'. $fieldName .'" class="input-group input-file" name="'. $fieldName .'">';
                    $field .= '<span class="input-group-btn">';
                        $field .= '<button  class="btn btn-default btn-choose" ';
                            $field .= '     type="button" ';
                            $field .= '     onclick="$(this).parents(\'.input-file\').prev().click();';
                        $field .= '">Choisir</button>';
                    $field .= '</span>';
                    $field .= '<input   type="text"';
                        $field .= '     class="form-control"';
                        if ( $old !== null ) {
                            $field .= ' placeholder="'.config('fieldMacroHelpers.'.$fieldEntity.'.'.$fieldName.'.placeholder_edit').'"';
                        } else {
                            $field .= ' placeholder="'.config('fieldMacroHelpers.'.$fieldEntity.'.'.$fieldName.'.placeholder_add').'"';
                        }
                        
                        $field .= '     style="cursor:pointer;"';
                        $field .= '     onclick="$(this).parents(\'.input-file\').prev().click(); return false;';
                    $field .= '">';

                    $field .= '<span class="input-group-btn">';
                        $field .= '<button  class="btn btn-warning btn-reset"';
                            $field .= '     type="button"';
                            $field .= '     onclick="';
                            $field .= '         $(this).parents(\'.input-file\').prev().val(null);';
                            $field .= '         $(this).parents(\'.input-file\').find(\'input\').val(\'\');';
                        $field .= '">Effacer</button>';
                    $field .= '</span>';
                $field .= '</div>';
                $field .= '<span class="help-block" style="min-height:20px;">'. $errorsContent .'</span>';
            $field .= '</div>';


            return $field;
        });


    }
}
