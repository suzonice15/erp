if ($.fn.select2) {
                                    var placeholder = "Select a State";
                                    $('.select2, .select2-multiple').select2({
                                        placeholder: placeholder
                                    });

                                    $('.select2-allow-clear').select2({
                                        allowClear: true,
                                        placeholder: placeholder
                                    });
                                    $('button[data-select2-open]').click(function () {
                                        $('#' + $(this).data('select2-open')).select2('open');
                                    });
                                    var select2OpenEventName = "select2-open";
                                    $(':checkbox').on("click", function () {
                                        $(this).parent().nextAll('select').select2("enable", this.checked);
                                    });
                                }
                            