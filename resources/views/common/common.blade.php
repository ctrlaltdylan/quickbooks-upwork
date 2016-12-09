 @push('css')
   {!! HTML::style('public/libs/datatable/extensions/Buttons/css/buttons.dataTables.min.css') !!}
 @endpush
 
 
 @push('javascript')
   {!! HTML::script('public/libs/datatable/js/dataTables.bootstrap.min.js') !!}
   {!! HTML::script('public/libs/datatable/extensions/Buttons/js/dataTables.buttons.min.js') !!}
   {!! HTML::script('public/libs/datatable/extensions/Buttons/js/buttons.flash.min.js') !!}
   {!! HTML::script('public/libs/datatable/extensions/Buttons/js/jszip.min.js') !!}
   {!! HTML::script('public/libs/datatable/extensions/Buttons/js/pdfmake.min.js') !!}
   {!! HTML::script('public/libs/datatable/extensions/Buttons/js/vfs_fonts.js') !!}
   {!! HTML::script('public/libs/datatable/extensions/Buttons/js/buttons.html5.min.js') !!}
   {!! HTML::script('public/libs/datatable/extensions/Buttons/js/buttons.print.min.js') !!}
   {!! HTML::script('public/libs/datatable/extensions/Buttons/js/buttons.colVis.min.js') !!}
@endpush