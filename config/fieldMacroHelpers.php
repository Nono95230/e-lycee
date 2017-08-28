<?php

return [
    'post' => [
        'title'         => [
                            'label'         => 'Titre de l\'article',
                            'placeholder'   => 'Définisez le titre de l\'article...'
        ],
        'abstract'      => [
                            'label'         => 'Résumé de l\'article',
                            'placeholder'   => 'Définissez le résumé de l\'article...'
        ],
        'content'       => [
                            'label'         => 'Contenu de l\'article',
                            'placeholder'   => 'Définissez le contenu de l\'article...'
        ],
        'url_thumbnail' => [
                            'label'             => 'Image à la une de l\'article',
                            'placeholder_add'   => 'Choisissez un fichier...',
                            'placeholder_edit'  => 'Pour changer l\'image actuelle, choisissez un fichier...',
                            'old_advice'        => 'Pour conserver l\'image actuelle de l\'article, laissez le champs ci-dessous vide'
        ],
        'status_check'  => [
                            'label' => 'Publié l\'article'
        ],
        'submit_add'  => 'Ajouter cet article',
        'submit_edit' => 'Éditer cet article'
    ],
    'qcm'=>[
        'title'         => [
                            'label'         => 'Titre du QCM',
                            'placeholder'   => 'Définissez le titre du QCM'
        ],
        'class_level'   => [
                            'label'         => 'Niveau de la classe',
                            'premiere'      => 'Première',
                            'terminale'     => 'Terminale'
        ],
        'nb_question'   => [
                            'label'         => 'Nombre de question',
                            'placeholder'   => 'Indiquer le nombre de question'
        ],
        'status'        => [
                            'label'     => 'Publié le QCM'
        ],
        'submit_add'    => 'Ajouter les questions',
        'submit_edit'   => 'Éditer le QCM'
    ],
    'question'=>[
        'content'       => [
                            'label' => 'Question n°',
                            'placeholder' => 'Poser la question'
        ],
        'answer'        => [
                            'label' => 'Réponse de la question n°',
                            'yes' => 'Oui',
                            'no' => 'Non'
        ],
        'submit_create' => 'Enregistrer ce QCM'
    ],
    'contact'=>[
        'email'         => [
                            'label' => 'Email',
                            'placeholder' => 'Renseigner votre email'
        ],
        'subject'       =>[
                            'label' => 'Sujet',
                            'placeholder' => 'Renseigner le sujet'
        ],
        'commentaire'   =>[
                            'label' => 'Commentaire',
                            'placeholder' => 'Indiquer votre commentaire'
        ],
        'submit_send'   => 'Envoyer'
    ]

];