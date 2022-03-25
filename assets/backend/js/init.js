"use strict";

// INIT DATATABLES
function initDataTables(tableIds, pageLength = 10) {
  tableIds.map(tableId => {
    $('#' + tableId).DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "pageLength": pageLength
    });
  });
}

//Initialize Select2 Elements
function initSelect2() {
  $('.select2').select2();
}

// FOR LOADING THE IMAGE IN FILE UPLOAD VIEW. I'VE DONE THIS FOR AVOIDING INLINE CSS
function initPreviewer(thumbnailIds) {
  thumbnailIds.map(thumbnailId => {
    const thumbnail = $('#' + thumbnailId).attr('thumbnail');
    $('#' + thumbnailId).css('background-image', 'url(' + thumbnail + ')');
  });
}

// INITIALIZE CLOCK PICKER
function initClockPicker() {
  $('.clockpicker').clockpicker({
    placement: 'top',
    align: 'left',
    donetext: 'Done'
  });
}

// INITIALIZE TOOLTIPS
function initToolTip() {
  $('[data-toggle="tooltip"]').tooltip();
}

// INITIALIZE SUMMERNOTE
function initSummernote(editorIds) {
  editorIds.map(editorId => {
    $('#' + editorId).summernote();
  });
}

// INITIALIZE DATERANGE PICKER
function initDateRangePicker(dateRangeIds) {
  console.log(dateRangeIds);
  dateRangeIds.map(dateRangeId => {
    $('#' + dateRangeId).daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function (start, end) {
        $('#selected-date-range').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $('#selected-date-range-value').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      }
    );
  });
}