<!-- begin scroll to top btn -->
<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
    class="fa fa-angle-up"></i></a>
<!-- end scroll to top btn -->
</div>
<!-- end page container -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script type="text/javascript" src="../../frontend/js/gestorProfessor.js"></script>
<script type="text/javascript" src="../../frontend/js/gestorAluno.js"></script>

<script src="../../frontend/assets/plugins/jquery/jquery.js"></script>
<script src="../../frontend/assets/plugins/chart.js/Chart.min.js"></script>
<script src="../../frontend/assets/js/demo.js"></script>

<script src="../../frontend/assets/js/app.min.js"></script>
<script src="../../frontend/assets/js/theme/apple.min.js"></script>


<script src="../../frontend/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../frontend/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../frontend/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>

<script src="../../frontend/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../frontend/assets/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="../../frontend/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="../../frontend/assets/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../../frontend/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../../frontend/assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../../frontend/assets/plugins/pdfmake/build/pdfmake.min.js"></script>
<script src="../../frontend/assets/plugins/jszip/dist/jszip.min.js"></script>
<script src="../../frontend/assets/js/demo/table-manage-buttons.demo.js"></script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="../../frontend/assets/plugins/ckeditor/ckeditor.js"></script>
<script src="../../frontend/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js"></script>
<script src="../../frontend/assets/js/demo/form-wysiwyg.demo.js"></script>

<!-- ================== BEGIN BASE JS ================== -->

<script src="../../frontend/assets/js/theme/apple.min.js"></script>
<script src="../../frontend/assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
<script src="../../frontend/assets/js/demo/chart-apex.demo.js"></script>
<script src="../../frontend/assets/plugins/parsleyjs/dist/parsley.js"></script>
<script src="../../frontend/assets/plugins/smartwizard/dist/js/jquery.smartWizard.js"></script>
<script src="../../frontend/assets/js/demo/form-wizards-validation.demo.js"></script>
<!-- ================== END BASE JS ================== -->

<!-- ========../../frontend/========== BEGIN PAGE LEVEL JS ================== -->

<!-- ================== BEGIN BASE JS ================== -->
<script>
  //-------------
  //- DONUT CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
  var donutData = {
    labels: [
      'Chrome',
      'IE',
      'FireFox',
      'Safari',
      'Opera',
      'Navigator',
    ],
    datasets: [{
      data: [700, 500, 400, 600, 300, 100],
      backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
    }]
  }
  var donutOptions = {
    maintainAspectRatio: false,
    responsive: true,
  }
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  var donutChart = new Chart(donutChartCanvas, {
    type: 'doughnut',
    data: donutData,
    options: donutOptions
  })
</script>

</body>

</html>