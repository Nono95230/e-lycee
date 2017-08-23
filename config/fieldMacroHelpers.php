<?php

return [
    'post' => [
        'title'     => [
                        'label'         => 'Titre de l\'article',
                        'placeholder'   => 'Définisez le titre de l\'article...'
                    ],
        'abstract'  => [
                        'label'         => 'Résumé de l\'article',
                        'placeholder'   => 'Définissez le résumé de l\'article...'
                    ],
        'content'   => [
                        'label'         => 'Contenu de l\'article',
                        'placeholder'   => 'Définissez le contenu de l\'article...'
                    ],
        'url_thumbnail'  => [
                        'label'             => 'Image à la une de l\'article',
                        'placeholder_add'   => 'Choisissez un fichier...',
                        'placeholder_edit'  => 'Pour changer l\'image actuelle, choisissez un fichier...',
                        'old_advice'        => 'Pour conserver l\'image actuelle de l\'article, laissez le champs ci-dessous vide'
                    ],
        'status_check' => [
                            'label'     => 'Publié l\'article'
                        ],
        'submit_add'  => 'Ajouter cet article',
        'submit_edit' => 'Éditer cet article'
    ],
    'question'=>[
        'title'       =>[
                        'label'         => 'Titre du QCM',
                        'placeholder'   => 'Définissez le titre du QCM'
                        ],
        'class_level' =>[
                        'label' => 'Niveau de la classe'
                        ],
        'nb_choice'   =>[
                        'label' => 'Nombre de question',
                        'placeholder'   => 'Indiquer le nombre de question'
                        ],
        'status'      =>[
                        'label'     => 'Publié le QCM'
                        ],
        'submit_add'  => 'Second Formulaire',
        'submit_edit' => 'Éditer ce QCM'
    ],
    'choice'=>[
        'title'       =>[
                        'label'         => 'Titre du QCM',
                        'placeholder'   => 'Définissez le titre du QCM'
                        ],
        'question' =>[
                        'label' => 'Question n°',
                        'placeholder' => 'Poser la question',
                        ],
        'submit_create'  => 'Enregistrer ce QCM'
    ]

];