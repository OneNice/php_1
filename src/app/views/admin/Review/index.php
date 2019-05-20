<!-- Start Page content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">Заказанные билеты</h4>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-12 text-sm-center form-inline">
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
                            <th data-sort-initial="true" data-toggle="true">Пользователь</th>
                            <th data-sort-initial="true" data-toggle="true">Мероприятие</th>
                            <th data-sort-initial="true" data-toggle="true">Оценка</th>
                            <th data-sort-initial="true" data-toggle="true">Отзыв</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($votes as $vote) { ?>

                        <tr>
                            <td class="text-center">
                                <button data="<?= $vote->id?>" class="m_edit btn btn-outline-danger btn-sm btn-icon"><i class=" mdi mdi-cancel  "></i></button>
                            </td>
                            <td><?= $vote->id?></td>
                            <td>
                                <span
                                        class="badge badge-info"
                                        data-toggle="tooltip"
                                        data-placement="top" title=""
                                        data-original-title="<?= $vote->user->login?>">
                                    <?= $vote->user_id?>
                                </span>
                            </td>
                            <td>
                                <span
                                        class="badge badge-info"
                                        data-toggle="tooltip"
                                        data-placement="top" title=""
                                        data-original-title="<?= $vote->event->title?>">
                                    <?= $vote->event_id?>
                                </span>
                            </td>
                            <td><?= $vote->score?></td>
                            <td><?= $vote->comment?></td>
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
                            myRedirect("/admin/review/cancel", "id", $(this).attr('data'));
                        });
                        $('.m_delete').on('click', function () {
                            var myRedirect = function(redirectUrl, arg, value) {
                                var form = $('<form action="' + redirectUrl + '" method="post">' +
                                    '<input type="hidden" name="'+ arg +'" value="' + value + '"></input>' + '</form>');
                                $('body').append(form);
                                $(form).submit();
                            };
                            myRedirect("/admin/review/del", "id", $(this).attr('data'));
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