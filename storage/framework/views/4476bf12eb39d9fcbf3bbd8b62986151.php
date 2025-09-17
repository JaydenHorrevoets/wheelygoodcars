<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Auto aanbieden</h2>
    <form id="step1">
        <label>Kenteken:</label>
        <input type="text" name="license_plate" required>
        <button type="button" onclick="checkLicensePlate()">Check</button>
    </form>
    <form id="step2" style="display:none;" method="POST" action="<?php echo e(route('cars.store')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="license_plate" id="license_plate">
        <label>Merk:</label>
        <input type="text" name="merk" id="merk" readonly>
        <label>Model:</label>
        <input type="text" name="model" id="model" readonly>
        <label>Bouwjaar:</label>
        <input type="text" name="bouwjaar" id="bouwjaar" readonly>
        <label>Prijs:</label>
        <input type="number" name="price" required>
        <button type="submit">Aanbieden</button>
    </form>
    <div id="form-error" style="color:red; margin-top:10px; display:none;"></div>
    <div id="form-success" style="color:green; margin-top:10px; display:none;"></div>
    <a href="<?php echo e(route('cars.index')); ?>" class="btn btn-link mt-3">Terug naar overzicht</a>
</div>
<script>
function checkLicensePlate() {
    let kenteken = document.querySelector('[name="license_plate"]').value;
    document.getElementById('form-error').style.display = 'none';
    document.getElementById('form-success').style.display = 'none';
    if (!kenteken) {
        document.getElementById('form-error').innerText = 'Vul een kenteken in.';
        document.getElementById('form-error').style.display = 'block';
        return;
    }
    fetch('<?php echo e(route('cars.checkLicensePlate')); ?>', {
        method: 'POST',
        headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'},
        body: JSON.stringify({license_plate: kenteken})
    })
    .then(res => {
        if (!res.ok) throw new Error('Kenteken niet gevonden of serverfout.');
        return res.json();
    })
    .then(data => {
        document.getElementById('step1').style.display = 'none';
        document.getElementById('step2').style.display = 'block';
        document.getElementById('license_plate').value = kenteken;
        document.getElementById('merk').value = data.merk;
        document.getElementById('model').value = data.model;
        document.getElementById('bouwjaar').value = data.bouwjaar;
    })
    .catch(err => {
        document.getElementById('form-error').innerText = err.message;
        document.getElementById('form-error').style.display = 'block';
    });
}
// Optioneel: feedback na succesvol aanbieden
if (window.location.search.includes('success')) {
    document.getElementById('form-success').innerText = 'Auto succesvol aangeboden!';
    document.getElementById('form-success').style.display = 'block';
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\wheelygoodcars\resources\views/cars/create.blade.php ENDPATH**/ ?>