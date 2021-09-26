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
          $tag->src = $tag->media_type == 'vid-web' ? $tag->file->yt_url() : $tag->file->url();

          if ($tag->file->media_type() == 'vid-web') {
            $media_label = 'Vidéo';
          } elseif  ($tag->file->media_type() == 'img') {
            $media_label = 'Image';
          } elseif ($tag->file->media_type() == 'vid-file') {
            $media_label = 'Vidéo';
          } else {
            $media_label = 'WTF';
          }

          
          
          // $tag->alt = $tag->alt ?? $tag->file->alt()->or(' ')->value();
          $tag->caption = $tag->caption ?? $tag->file->caption()->value();
          
          $html = '<a href="#" class="image-texte" data-media="' . $tag->media_type . '" data-url="' . $tag->src . '"></a>';
          $html .= '<span class="image-legende">' . $tag->caption . '</span>';

          return $html;
            
        }
      }
    ],
    'medias' => [
      'attr' => [
        'alt',
        'caption',
        'class',
      ],
      'html' => function ($tag) {
        $files = $tag->value;
        $files = explode(" ", $files);

        $token = bin2hex(random_bytes(7));
        $html = "";
        $script = "<script type='text/javascript'>var medias_" . $token . " = [";
        
        // var_dump($files);
        
        foreach($files as $file){
          $f = $tag->file($file);

          if ($f) {
            // url
            $u = "/phonecinema" . str_replace(kirby()->site()->url(), "", $f->url());
            $script .= "{href:'" . $u . "',";

            // caption
            $c = $f->caption()->kti();
            if($c != ""){
              $caption_id = "medias_" . Str::slug($f);
              $caption_id = "medias_" . bin2hex(random_bytes(3));
              $caption = "<span class='glightbox-desc " . $caption_id . "'>" . $c . "</span>";
              $script .= "description: '.". $caption_id ."', ";
              // $html .= $caption;
              $rawcaption = addslashes( strip_tags($f->caption()->kti()) );
              $script .= "description: '". $rawcaption ."', ";
            }

            // type
            $t = $f->media_type()->value();
            switch ($t) {
              case 'vid-file':
                $tt= "video";
                $script .= "source:'local', ";
                break;
              case 'vid-web':
                $tt= "video";
                $script .= "type:'youtube', ";
                break;             
              default:
                $tt = "image";
                $source = "";
                break;
            };  
            $script .= "type:'". $tt ."', ";
            $script .= "},";
          }
        }
        $script .= "];</script>";
        $html .= $script;
        // $htlm = "";
        $html .= '<a href="#" class="medias-texte" data-media="medias" data-script="medias_'. $token .'"></a>';
        // var_dump($html);
        return $html;
      }
    ]
  ]
]);