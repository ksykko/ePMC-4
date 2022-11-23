<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?= base_url('/assets/js/dashboard-header.js') ?>"></script>



<script>
    var populationData = JSON.parse('<?= $population ?>');
    var bmiData = JSON.parse('<?= $bmi_data; ?>');

    // reverse populationData.male 
    var male_data = Object.values(populationData.male).reverse();
    var female_data = Object.values(populationData.female).reverse();
    console.log(reverse);


    var stock_products = JSON.parse('<?= $stock_products ?>');
    var stock_in = JSON.parse('<?= $stock_in ?>');
    var stock_out = JSON.parse('<?= $stock_out ?>');
    

</script>

<!-- Charts -->
<script src="<?= base_url('/assets/js/Charts/age_chart.js') ?>"></script>
<script src="<?= base_url('/assets/js/Charts/stocks_chart.js') ?>"></script>
<script src="<?= base_url('/assets/js/Charts/bmi_chart.js') ?>"></script>
<script src="<?= base_url('/assets/js/Charts/treatment_chart.js') ?>"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>


</body>

</html>