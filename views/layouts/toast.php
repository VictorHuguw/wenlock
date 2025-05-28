<?php
$session = Yii::$app->session;
$success = $session->getFlash('success');
$error = $session->getFlash('error', null, true);
?>

<?php if ($success): ?>
    <div class="toast toast-success"><?= $success ?></div>
<?php elseif ($error): ?>
    <div class="toast toast-error"><?= $error ?></div>
<?php endif; ?>

<style>
.toast {
    position: fixed;
    top: 20px;
    right: 20px;
    padding: 15px;
    border-radius: 5px;
    color: white;
    z-index: 1000;
    opacity: 0.9;
}
.toast-success { background-color: #28a745; }
.toast-error { background-color: #dc3545; }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        const toast = document.querySelector('.toast');
        if (toast) toast.remove();
    }, 3000);
});
</script>
