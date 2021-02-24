$(function () {
    // Button add field
    $(document).on('click', '.add-field', function (e) {
        let fieldList = $('.field-list')
        let lastField = fieldList.find('.field-item').last()
        let lastFieldIndex = lastField.data('field-index')
        fieldList.append(fieldItemHtml(lastFieldIndex + 1))
    })

    // Button delete field
    $(document).on('click', '.delete-field', function (e) {
        let currentFieldList = $(this).closest('.field-list')
        let lastField = currentFieldList.find('.field-item')
        if (lastField.length > 1) {
            $(this).closest('.field-item').remove()
        }
    })

    // Listen select.field-type change
    $(document).on('change', 'select.field-type', function (e) {
        let currentField = $(this).closest('.field-item')
        let fieldIndex = parseInt(currentField.data('field-index'))

        let val = $(this).val()
        if (val === 'checkbox' || val === 'radio' || val === 'select') {
            // show value
            currentField.find('.show-value').html(valueFrameHtml(fieldIndex))
        } else {
            // hidden value
            currentField.find('.show-value').removeClass('card').text('')
        }
    })

    // Button add value
    $(document).on('click', '.add-value', function (e) {
        let currentField = $(this).closest('.field-item')
        let fieldIndex = parseInt(currentField.data('field-index'))
        let currentValueFrame = $(this).closest('.show-value')
        let lastValue = currentValueFrame.find('.value-item').last()
        let lastValueIndex = lastValue.data('value-index')
        currentValueFrame.find('.list-value').append(valueItemHtml(fieldIndex, lastValueIndex + 1))
    })

    // Button delete value
    $(document).on('click', '.delete-value', function (e) {
        let currentValueFrame = $(this).closest('.show-value')
        let lastValue = currentValueFrame.find('.value-item')
        if (lastValue.length > 1) {
            $(this).closest('.value-item').remove()
        }
    })

    var fieldItemHtml = (fieldIndex) => {
        return `<div class="field-item badge-dark mt-3" data-field-index="${fieldIndex}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title text-white">Trường</h5>
                            <i class="delete-field fa fa-trash-alt cursor-pointer"></i>
                        </div>
                        <div class="form-group row">
                            <label for="name${fieldIndex}" class="col-sm-2 col-form-label text-white">Tên trường</label>
                            <div class="col-sm-8 col-lg-6">
                                <input type="text" class="form-control" id="name${fieldIndex}" placeholder="Tên trường" name="fields[${fieldIndex}][name]">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type${fieldIndex}" class="col-sm-2 col-form-label text-white">Kiểu dữ liệu</label>
                            <div class="col-sm-8 col-lg-6">
                                <select class="field-type form-control" id="type${fieldIndex}" name="fields[${fieldIndex}][type]">
                                    <option value="text">Text</option>
                                    <option value="number">Number</option>
                                    <option value="textarea">Textarea</option>
                                    <option value="checkbox">Checkbox</option>
                                    <option value="radio">Radio</option>
                                    <option value="select">Select</option>
                                    <option value="file">File</option>
                                    <option value="date">Date</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-white">Validate</label>
                            <div class="col-sm-8 col-lg-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="fields[${fieldIndex}][validate]" id="validate1${fieldIndex}" value="required">
                                    <label class="form-check-label text-white" for="validate1${fieldIndex}">
                                        Required
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="fields[${fieldIndex}][validate]" id="validate2${fieldIndex}" value="option">
                                    <label class="form-check-label text-white" for="validate2${fieldIndex}">
                                        Option
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="show-value"></div>

                    </div>
                </div>`
    }

    var valueFrameHtml = (fieldIndex) => {
        return `<div class="card-body">
                    <h6 class="card-title text-white">Values</h6>
                    <div class="list-value">
                        <div class="value-item form-group row" data-value-index="0">
                            <label for="value${fieldIndex}0" class="col-sm-2 col-form-label text-white">Value</label>
                            <div class="col-sm-8 col-lg-6">
                                <input type="text" class="form-control" id="value${fieldIndex}0" placeholder="Value" name="fields[${fieldIndex}][values][]">
                            </div>
                            <div class="position-relative">
                                <div class="position-absolute delete-center">
                                    <div class="delete-value fa fa-minus-circle cursor-pointer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="add-value fa fa-plus-circle cursor-pointer"></div>
                    </div>
                </div>`
    }

    var valueItemHtml = (fieldIndex, valueIndex) => {
        return `<div class="value-item form-group row" data-value-index="${valueIndex}">
                    <label for="value${fieldIndex}${valueIndex}" class="col-sm-2 col-form-label text-white">Value</label>
                    <div class="col-sm-8 col-lg-6">
                        <input type="text" class="form-control" id="value${fieldIndex}${valueIndex}" placeholder="Value" name="fields[${fieldIndex}][values][]">
                    </div>
                    <div class="position-relative">
                        <div class="position-absolute delete-center">
                            <div class="delete-value fa fa-minus-circle cursor-pointer"></div>
                        </div>
                    </div>
                </div>`
    }
});
