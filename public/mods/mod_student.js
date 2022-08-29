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
        name: 'Nama',
        data: 'Nama',
    },
    {
        name: 'NIM',
        data: 'NIM',
    },
    {
        name: 'Alamat',
        data: 'Alamat',
    },
    {
        name: 'id',
        data: 'id',
        mRender: (data) => {
            return `
                <button class="btn btn-outline-primary update" data-id="${data}">Edit</button>
                <button class="btn btn-outline-danger" data-toggle="delete" data-url="${$('meta[name="api-url-2"]').attr('content')}mahasiswa/${data}">Hapus</button>
            `
        }
    }
], () => {
    $('.update').unbind().on('click', async function(e) {
        e.preventDefault()
        var oldBtn = $(this).html()
        var id = $(this).data('id')
        $(this).html('Loading...').attr('disabled', 'disabled')

        const res = await fetch(`${$('meta[name="api-url-2"]').attr('content')}mahasiswa/${id}`)

        $(this).html(oldBtn).removeAttr('disabled')
        if(res.status == 200) {
            var { data } = await res.json()

            $('#myModal').find('.modal-title').html('Edit Mahasiswa')
            $('#myModal').find('form').attr('action', `${$('meta[name="api-url-2"]').attr('content')}mahasiswa/${id}`)
            $('#myModal').find('input[name="NIM"]').val(data.NIM)
            $('#myModal').find('input[name="Nama"]').val(data.Nama)
            $('#myModal').find('textarea[name="Alamat"]').val(data.Alamat)
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
    $('#myModal').find('.modal-title').html('Tambah Mahasiswa')
    $('#myModal').find('form').attr('action', `${$('meta[name="api-url-2"]').attr('content')}mahasiswa`)
    $('#myModal').modal('show')
    
    $(this).html(oldBtn).removeAttr('disabled')
})