<div class="table-responsive mb-3">
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>SNo.</th>
                <th>Product Name</th>
                <th>Product Size</th>
                <th>Type</th>
                <th>Qty</th>
                <th>Warehouse</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            @php
                $sn = 0;
            @endphp

            @foreach ($products as $index => $p)
                @foreach ($p->prices as $key => $price)
                    <tr>
                        @if ($key == 0)
                            <td rowspan="{{ $p->prices_count }}">{{ $index + 1 }}</td>
                            <td rowspan="{{ $p->prices_count }}">{{ $p->name }}</td>
                        @endif
                        <td>{{ $price->size }}</td>
                        <td>
                            <select name="stock[{{ $sn }}][type]" class="form-select">
                                <option value="in">In</option>
                                <option value="out">Out</option>
                            </select>
                        </td>
                        <td>
                            <input name="stock[{{ $sn }}][qty]" type="number" value="0"
                                class="form-control">
                            <input type="hidden" name="stock[{{ $sn }}][product_attribute_id]"
                                value="{{ $price->id }}" />
                        </td>
                        <td>
                            <select name="stock[{{ $sn }}][ware_house_id]" class="form-select">
                                @foreach ($warehouses as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="text" name="stock[{{ $sn }}][remarks]" class="form-control">
                        </td>
                    </tr>
                    @php
                        $sn++;
                    @endphp
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
<button class="btn btn-primary">Add Stock</button>
