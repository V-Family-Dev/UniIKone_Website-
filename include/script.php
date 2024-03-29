<script>
    $(document).ready(function() {
        $('#getitemdata').select2().on('select2:select', function(e) {
            var selectedName = $(this).find(':selected').data('iname');
            var selectedPrice = $(this).find(':selected').data('price');
            $(this).nextAll('input[name^="item-name"]').val(selectedName);
            $(this).nextAll('input[name^="price"]').val(selectedPrice);
        });




        $('#addFieldButton').click(function() {
            let itemno = parseInt($('#hdata').val(), 10);
            itemno++;
            let newItemHtml = `
                <div class="item-group-${itemno}">
                    <select name="selectitem[]" class="item-select">
                        <option value="">Select Item</option>
                        <?php foreach ($item as $row) { ?>
                            <option value="<?= $row['ItemCode']; ?>" data-iname="<?= $row['ItemName']; ?>" data-price="<?= $row['Price']; ?>"><?= $row['ItemName']; ?></option>
                        <?php } ?>
                    </select>
                    <input type="text" name="item-name-${itemno}" placeholder="Item Name">
                    <input type="text" name="price-${itemno}" placeholder="Price">
                    <input type="text" name="quantity-${itemno}" placeholder="Quantity">
                </div>
            `;
            $('#fieldsContainer').append(newItemHtml);
            $('.item-select:last').select2().on('select2:select', function(e) {
                var selectedName = $(this).find(':selected').data('iname');
                var selectedPrice = $(this).find(':selected').data('price');
                $(this).nextAll('input[name^="item-name"]').val(selectedName);
                $(this).nextAll('input[name^="price"]').val(selectedPrice);
            });
            let itemnos = parseInt($('#hdata').val(), 10);
            itemnos++;
            $('#hdata').val(itemnos);
        });

        $('#removef').click(function() {
            let itemnom = parseInt($('#hdata').val(), 10);
            if (itemnom > 1) {
                $('#fieldsContainer .item-group-' + itemnom).remove();
                itemnom--;
                $('#hdata').val(itemnom);
            }
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('#getempdata').select2({
            placeholder: "User Emp ID",
            allowClear: true
        }).on('select2:select', function(e) {
            var selectedContactName = $(this).find(':selected').data('name');
            $('#contact-person').val(selectedContactName);
            var selectedContactNumber = $(this).find(':selected').data('number');
            $('#contact-no').val(selectedContactNumber);
            var selectedCity = $(this).find(':selected').data('city');
            $('#city').val(selectedCity);
            var selectedAddress = $(this).find(':selected').data('address');
            $('#address').val(selectedAddress);
        });
    });
</script>