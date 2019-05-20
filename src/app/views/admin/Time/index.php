<!-- Start Page content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Все пользователи</h4>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-12 text-sm-center form-inline">
                                <div class="form-group mr-2">
                                    <button id="m_add" class="btn btn-primary"><i class="mdi mdi-plus-circle mr-2"></i> Добавить</button>
                                </div>
                                <div class="form-group">
                                    <input id="input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <table id="foo-addrow" class="table table-striped table-bordered m-b-0 toggle-circle" data-page-size="20">
                        <thead>
                        <tr>
                            <th data-sort-ignore="true" class="min-width"></th>
                            <th data-sort-initial="true" data-toggle="true">ID</th>
                            <th data-sort-initial="true" data-toggle="true">ID мероприятия</th>
                            <th data-sort-initial="true" data-toggle="true">ID места</th>
                            <th data-sort-initial="true" data-toggle="true">Список дат</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($eventtimes as $time) { ?>

                            <tr>
                                <td class="text-center">
                                    <button data="<?= $time->id?>" class="m_edit btn btn-outline-success btn-sm btn-icon"><i class=" icon-pencil "></i></button>
                                    <button data="<?= $time->id?>" class="m_delete btn btn-outline-danger btn-sm btn-icon"><i class="fa fa-times"></i></button>
                                </td>
                                <td><?= $time->id?></td>
                                <td>
                                    <span
                                            class="badge badge-info"
                                            data-toggle="tooltip"
                                            data-placement="top" title=""
                                            data-original-title="<?= $time->event->title?>">
                                        <?= $time->event_id?>
                                    </span>
                                </td>
                                <td>
                                    <span
                                            class="badge badge-info"
                                            data-toggle="tooltip"
                                            data-placement="top" title=""
                                            data-original-title="<?= $time->place->name?>">
                                        <?= $time->place_id?>
                                    </span>
                                </td>
                                <td><?= $time->date_array?></td>
                            </tr>

                        <?php }?>

                        </tbody>
                        <tfoot>
                        <tr class="active">
                            <td colspan="6">
                                <div class="text-right">
                                    <ul class="pagination pagination-split justify-content-end footable-pagination m-t-10"></ul>
                                </div>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                    <script src="/admin_assets/plugins/footable/js/footable.all.min.js"></script>
                    <script>
                        $('.m_edit').on('click', function () {
                            var myRedirect = function(redirectUrl, arg, value) {
                                var form = $('<form action="' + redirectUrl + '" method="post">' +
                                    '<input type="hidden" name="'+ arg +'" value="' + value + '"></input>' + '</form>');
                                $('body').append(form);
                                $(form).submit();
                            };
                            myRedirect("/admin/time/edit", "id", $(this).attr('data'));
                        });
                        $('.m_delete').on('click', function () {
                            var myRedirect = function(redirectUrl, arg, value) {
                                var form = $('<form action="' + redirectUrl + '" method="post">' +
                                    '<input type="hidden" name="'+ arg +'" value="' + value + '"></input>' + '</form>');
                                $('body').append(form);
                                $(form).submit();
                            };
                            myRedirect("/admin/time/del", "id", $(this).attr('data'));
                        });
                        $('#m_add').on('click', function () {
                            $(location).attr('href','/admin/time/add');
                        });
                        var addrow = $('#foo-addrow');
                        addrow.footable().on('click', '.demo-delete-row', function() {

                            //get the footable object
                            var footable = addrow.data('footable');

                            //get the row we are wanting to delete
                            var row = $(this).parents('tr:first');

                            //delete the row
                            footable.removeRow(row);
                        });
                        // Search input
                        $('#input-search2').on('input', function (e) {
                            e.preventDefault();
                            addrow.trigger('footable_filter', {filter: $(this).val()});
                        });
                    </script>
                </div>
            </div>
        </div>

    </div> <!-- container -->

</div> <!-- content -->