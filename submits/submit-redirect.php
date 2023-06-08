<?php



// DEBUG
// echo $_SESSION['condition'];
// DEBUG

?>
<div class="dialog-menu">
    <dialog id="dialog-close" open>Succesfully <?php echo $_SESSION['condition']; ?> <button onclick="CloseDialog()">Close</button></dialog>
</div>
<script>
const CloseDialog = () => {
    const dialog = document.querySelector('#dialog-close');
    dialog.close();
}   
</script>
<style>
    .dialog-menu {
        display: flex; 
        width: 100vw;
        /* height: 100vh; */
        /* background-color: black; */
        justify-content: center;
    }
    
    dialog {
        margin-top: 20px;
        margin-bottom: -62px;
        
        border: 1px, solid, blue;
        padding-top: 10px; 
        padding-bottom: 10px; 
        padding-left: 20px;
        padding-right: 20px; 
        position: static;
        border-radius: 10px;
    }
    button {
        border: none;
        padding: 5px;
        border-radius: 5px;
        background-color: #2f3947;
        color: white;
    }
</style>
<?php $_SESSION['condition'] = null; ?>