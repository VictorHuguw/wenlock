<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Json;
use yii\web\View; 

class ToastrFlash extends Widget
{
    public function run()
    {
        $session = Yii::$app->session;
        $flashes = $session->getAllFlashes(true); 

        $jsSuccess = Json::encode(isset($flashes['success']) ? $flashes['success'] : null);
        $jsError = Json::encode(isset($flashes['error']) ? $flashes['error'] : null);
        $jsWarning = Json::encode(isset($flashes['warning']) ? $flashes['warning'] : null);
        $jsInfo = Json::encode(isset($flashes['info']) ? $flashes['info'] : null);

        $this->view->registerJs(<<<JS
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "timeOut": "3000",
                "extendedTimeOut": "3000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            var successMessage = {$jsSuccess};
            if (successMessage) {
                toastr.success(successMessage);
            }

            var errorMessage = {$jsError};
            if (errorMessage) {
                toastr.error(errorMessage);
            }

            var warningMessage = {$jsWarning};
            if (warningMessage) {
                toastr.warning(warningMessage);
            }

            var infoMessage = {$jsInfo};
            if (infoMessage) {
                toastr.info(infoMessage);
            }
        });
        JS, View::POS_END); 
    }
}