<div class="row">
    <div class="mb-3 col-4">
        {{ Form::label('category_id', 'Select Category', ['class' => 'form-label']) }}
        {{ Form::select('category_id', $categories, null, ['class' => 'form-select category no_filter', 'placeholder' => 'Select Category']) }}
    </div>
</div>

<div id="products"></div>


@push('extra_scripts')
    <script>
        function fetchItems(category_id) {
            $.ajax({
                url: "{{ route('api.product.stock') }}?category_id=" + category_id,
                success: function(res) {
                    $('#products').html(res);
                }
            });
        }

        $(function() {
            $(document).on("change", ".category", function() {
                let parent = $(this).closest('.mb-3');
                let parentId = $(this).val();

                parent.nextAll('.mb-3').remove();
                if (parentId && parentId !== '') {

                    $.ajax({
                        url: "{{ route('api.category.index') }}/?id=" + parentId,
                        success: function(res) {
                            if (Object.keys(res).length) {
                                let options = `<option value>Select Category</option>`;

                                for (let id in res) {
                                    options += `<option value=${id}>${res[id]}</option>`;
                                }

                                parent.after(`
                                    <div class="mb-3 col-4">
                                        <label for="category_id_${parentId}" class="form-label">Select Category</label>
                                        <select class="form-select category no_filter" id="category_id_${parentId}" name="category_id">
                                            ${options} 
                                        </select>
                                    </div>
                                `);
                            }

                            fetchItems(parentId);
                        }
                    });

                }
            });
        });
    </script>
@endpush
