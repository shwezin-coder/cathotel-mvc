<?php 

namespace Core;
class SweetAlert {
    public static function showMessage($title,$message, $type) {
      echo "<script>
      $( document ).ready(function() {
        Swal.fire({
            title: '$title',
            text: '$message',
            type: '$type',
            confirmButtonText: 'OK'
          });
    });
      </script>";
    }
    public static function redirect_Message($title,$message,$type,$url)
    {
          echo "<script>
          $( document ).ready(function() {
            Swal.fire({
                title: '$title',
                text: '$message',
                type: '$type',
                confirmButtonText: 'OK'
              }).then(function() {
                window.location = '$url';
            });
        });
          </script>";
    }
  }