<?php

Kirby::plugin('phonecinema/medias', [
  'tags' => [
    'media' => [
      'attr' => [
        'alt',
        'caption',
        'class',
      ],
      'html' => function ($tag) {
        if ($tag->file = $tag->file($tag->value)) {
          $tag->media_type = $tag->file->media_type()->value();
          $tag->src = $tag->media_type == 'youtube' ? $tag->file->yt_url() : $tag->file->url();

          if ($tag->file->media_type() == 'youtube') {
            $media_label = 'Vidéo';
          } elseif  ($tag->file->media_type() == 'image') {
            $media_label = 'Image';
          } else {
            $media_label = 'WTF';
          }
          
          // $tag->alt = $tag->alt ?? $tag->file->alt()->or(' ')->value();
          $tag->caption = $tag->caption ?? $tag->file->caption()->value();
          
          $html = '<a href="" class="image-texte" data-media="' . $tag->media_type . '" data-url="' . $tag->src . '">' . $media_label . '</a>';
          $html .= '<span class="image-legende">' . $tag->caption . '</span>';

          return $html;
            
        }
      }
    ]
  ]
]);