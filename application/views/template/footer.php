  <!-- /.card-body -->
  <!-- <div class="card-footer">
      Footer
  </div> -->
  <!-- /.card-footer-->
  <!-- /.card -->

  </section>
  <!-- /.content -->
  </div>
  <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
          <b>Version</b> 3.1.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <p id="columnDatatable" data-value="<?= $title ?>" hidden></p>
  </div>
  <!-- ./wrapper -->

  <!-- AdminLTE for demo purposes -->
  <!-- jQuery -->
  <!-- jQuery -->

  <script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?= base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url('assets') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('assets') ?>/dist/js/demo.js"></script>

  <!-- DATEPICKER -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>


  <script>
      $(function() {
          let column = $('#columnDatatable').data('value')
          let columns = []
          if (column == 'Bengkel' || column == 'PKL') {
              columns = [0, 1, 2, 3, 4]
          } else if (column == 'Siswa PKL' || column == 'Agenda') {
              columns = [0, 1, 2, 3, 4, 5]
          }
          console.log(column)
          $("#table").DataTable({
              "responsive": true,
              "lengthChange": false,
              "autoWidth": false,
              //   "buttons": ["excel", "pdf", "print"]
              //   "buttons": [{
              //           extend: 'print',
              //           title: 'PKL Bengkel | ' + '<?= $title   ?>',
              //           exportOptions: {
              //               columns: columns
              //           }
              //       },
              //       {
              //           extend: 'pdf',
              //           title: '<?= $title   ?>',
              //           exportOptions: {
              //               columns: columns
              //           }
              //       },
              //       {
              //           extend: 'excel',
              //           title: '<?= $title   ?>',
              //           exportOptions: {
              //               columns: columns
              //           }
              //       },
              //   ]
          }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');

      });
      $(document).ready(function() {


          $(function() {
              let currentDate = new Date();
              $("#datepicker").datepicker({
                  dateFormat: 'yy-mm-dd',
                  minDate: -7,
                  maxDate: currentDate
              });
              $('#datepicker').keyup(function() {
                  if (this.value.match(/[^0-9]/g)) {
                      this.value = this.value.replace(/[^0-9^-]/g, '');
                  }
              });
          });

          $(function() {
              let currentDate = new Date();
              //   console.log(currentDate)
              $("#tanggal_masuk").datepicker({
                  dateFormat: 'yy-mm-dd',
                  minDate: "2022-01-15",
                  maxDate: "2022-03-15",
              });
              $('#tanggal_masuk').keyup(function() {
                  if (this.value.match(/[^0-9]/g)) {
                      this.value = this.value.replace(/[^0-9^-]/g, '');
                  }
              });
          });
      })
  </script>
  </body>

  </html>