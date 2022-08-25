initTable('#dataTable', [
    {
        name: 'id',
        data: null,
        width: '1%',
        mRender: function (data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
        }
    },
    {
        name: 'name',
        data: 'name',
        mRender: (data, type, row) => {
            var render = ``
            render += row.front_degree ?? ''
            render += ' ' + data
            render += row.back_degree != null ? ', '+ row.back_degree : ''
            return render
        }
    },
    {
        name: 'gender',
        data: 'gender',
    },
    {
        name: 'employee_type_id',
        data: 'employee_type',
        mRender: (data) => {
            return data.name
        }
    },
    {
        name: 'id',
        data: 'id',
        mRender: (data) => {
            return `
                <button class="btn btn-outline-primary update" data-id="${data}">Edit</button>
                <button class="btn btn-outline-danger" data-toggle="delete" data-url="${$('meta[name="api-url-1"]').attr('content')}${data}/employee">Hapus</button>
            `
        }
    }
], () => {
    $('.update').unbind().on('click', async function(e) {
        e.preventDefault()
        var oldBtn = $(this).html()
        var id = $(this).data('id')
        $(this).html('Loading...').attr('disabled', 'disabled')

        const resEmployeeType = await fetch(`${$('meta[name="api-url-1"]').attr('content')}employee-type`)
        var { data } = await resEmployeeType.json()
        var options = data.map(val => `<option value="${val.id}">${val.name}</option>`)
        $('#myModal').find('select[name="employee_type_id"]').html(options)

        const res = await fetch(`${$('meta[name="api-url-1"]').attr('content')}${id}/employee`)

        $(this).html(oldBtn).removeAttr('disabled')
        if(res.status == 200) {
            var { data } = await res.json()

            $('#myModal').find('.modal-title').html('Edit Dosen')
            $('#myModal').find('form').attr('action', `${$('meta[name="api-url-1"]').attr('content')}${id}/employee`)
            // $('#myModal').find('form').attr('method', 'post')
            $('#myModal').find('select[name="employee_type_id"]').val(data.employee_type_id)
            // $('#myModal').find('input[name="_method"]').val('patch')
            $('#myModal').find('input[name="nip"]').val(data.nip)
            $('#myModal').find('input[name="nidn"]').val(data.nidn)
            $('#myModal').find('input[name="name"]').val(data.name)
            $('#myModal').find('select[name="gender"]').val(data.gender)
            $('#myModal').find('input[name="phone"]').val(data.phone)
            $('#myModal').find('input[name="email"]').val(data.email)
            $('#myModal').find('input[name="birthplace"]').val(data.birthplace)
            $('#myModal').find('input[name="birthdate"]').val(data.birthdate)
            $('#myModal').find('select[name="religion"]').val(data.religion)
            $('#myModal').find('textarea[name="address"]').val(data.address)
            $('#myModal').find('input[name="city"]').val(data.city)
            $('#myModal').find('input[name="district"]').val(data.district)
            $('#myModal').find('input[name="province"]').val(data.province)
            $('#myModal').find('input[name="nationality"]').val(data.nationality)
            $('#myModal').find('input[name="postal_code"]').val(data.postal_code)
            $('#myModal').find('input[name="back_degree"]').val(data.back_degree)
            $('#myModal').find('input[name="front_degree"]').val(data.front_degree)
            $('#myModal').modal('show')
        } else {
            alert('Opps! terjadi kesalahan')
        }
    })
})

$('#create').unbind().on('click', async function(e) {
    e.preventDefault()
    var oldBtn = $(this).html()
    $(this).html('Loading...').attr('disabled', 'disabled')

    const res = await fetch(`${$('meta[name="api-url-1"]').attr('content')}employee-type`)
    
    if(res.status == 200){
        var { data } = await res.json()
        var options = data.map(val => `<option value="${val.id}">${val.name}</option>`)

        // $('#myModal').find('input[name="_method"]').val('')
        $('#myModal').find('select[name="employee_type_id"]').html(options)
        $('#myModal').find('.modal-title').html('Tambah Dosen')
        $('#myModal').find('form').attr('action', `${$('meta[name="api-url-1"]').attr('content')}employee`)
        $('#myModal').modal('show')
    } else {
        alert('Opps! terjadi kesalahan')
    }
    
    $(this).html(oldBtn).removeAttr('disabled')
})