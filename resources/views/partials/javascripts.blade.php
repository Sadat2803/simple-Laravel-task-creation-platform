<script>
    window.deleteButtonTrans = '{{ trans("melyago.mgo_delete_selected") }}';
    window.copyButtonTrans = '{{ trans("melyago.mgo_copy") }}';
    window.csvButtonTrans = '{{ trans("melyago.mgo_csv") }}';
    window.excelButtonTrans = '{{ trans("melyago.mgo_excel") }}';
    window.pdfButtonTrans = '{{ trans("melyago.mgo_pdf") }}';
    window.printButtonTrans = '{{ trans("melyago.mgo_print") }}';
    window.colvisButtonTrans = '{{ trans("melyago.mgo_colvis") }}';
</script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

{{--<script src="{{ url('adminlte/js/buttons.flash.min.js') }}"></script>--}}
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script src="{{ url('adminlte/js') }}/bootstrap.min.js"></script>
<script src="{{ url('adminlte/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ url('adminlte/js') }}/main.js"></script>

<script src="{{ url('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ url('adminlte/js/app.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/daterangepicker') }}/moment.js"></script>
<script src="{{ url('adminlte/plugins/daterangepicker') }}/daterangepicker.js"></script>

<script src="{{ url('adminlte/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('adminlte/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ url('adminlte/js/chart.js') }}"></script>
<script src="{{ url('adminlte/js/chart.bundle.js') }}"></script>
<script src="{{ url('adminlte/js/filter.js') }}"></script>
<script>
    window._token = '{{ csrf_token() }}';
</script>
<script>
    $.extend(true, $.fn.dataTable.defaults, {
        "language": {
            "url": "{{url('adminlte/js/French.json') }}"
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#update_db_cars').on('click', function(e){
        $.ajax({
            method : 'GET',
            url : $(this).data('href'),
        })
            .then(res => res.status === 'success' ? alert(res.data.message) : alert(res.message))
            .cache(error => alert(error))
        ;
    });
</script>

<script>
    $(function(){
        /** add active class and stay opened when selected */
        var url = window.location;

        // for sidebar menu entirely but not cover treeview
        $('ul.sidebar-menu a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');

        $('ul.treeview-menu a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');

        // for treeview
        $('ul.treeview-menu a').filter(function() {
             return this.href == url;
        }).parentsUntil('.sidebar-menu > .treeview-menu').addClass('menu-open').css('display', 'block');
    });
</script>

<script>
    $(function(){
        $('#contratTime').daterangepicker();
    });

    $.ajax({
        'method':'get',
        'url':'/admin/notifications/get_notifs',
        'data':"notifications",
        'success':
            function(response){
                $('#notif').html(response['nb_notifs']);
                $('#msg_notif').html("Vous avez "+response['nb_notifs']+" notifications");
                response['last_notifs'].forEach(function(item){
                    $("#menu_notifs").append('<li><a href="/admin/notifications/clique/'+item['id']+'"><i class="fa fa-car text-blue"></i>'+item["message"]+'</a></li>');

                });
            }
    })

</script>





@yield('javascript')
