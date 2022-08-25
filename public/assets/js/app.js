$(function() {
    handleView()
})

const handleView = async (url = null) => {
    const res = await fetch(url ?? window.location.href, {
        headers: {
            "X-Requested-With": "XMLHttpRequest"
        }
    })

    if(res.status == 200) {
        var data = await res.text()
        $('v-rendering').html(data)
        handleEvent()
    } else {
        alert('Opps! terjadi kesalahan')
    }
}

const pushState = (url) => {
    handleView(url)
    history.pushState(null, null, url)
}

const handleEvent = () => {
    $('button[data-toggle="ajax"]').unbind().on('click', function(e) {
        e.preventDefault()
        pushState($(this).data('target'))
    })

    $('a[data-toggle="ajax"]').unbind().on('click', function(e){
        e.preventDefault()
        pushState($(this).attr('href'))
    })

    $('button[data-toggle="delete"]').unbind().on('click', async function(e) {
        e.preventDefault()
        if(confirm('Yaking ingin menghapus data?')) {
            var oldBtn = $(this).html()
            $(this).html('loading...').attr('disabled', 'disabled')
            var url = $(this).data('url')

            const res = await fetch(url, {
                method: 'delete',
                headers: {
                    'accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            $(this).html(oldBtn).removeAttr('disabled')
            if(res.status == 200) {
                if(typeof table != 'undefined') {
                    table.ajax.reload()
                } else {
                    handleView()
                }
            } else {
                alert('Gagal menghapus data')
            }
        }
    })

    $('form[data-request="ajax"]').unbind().on('submit', async function(e) {
        e.preventDefault()
        var oldBtn = $(this).find('button[type="submit"]').html()
        $(this).find('button[type="submit"]').html('Loading...').attr('disabled', 'disabled')

        const res = await fetch($(this).attr('action'), {
            method: $(this).attr('method'),
            headers: {
                'accept': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            body: generateFormBody(new FormData(this))
        })

        $(this).find('button[type="submit"]').html(oldBtn).removeAttr('disabled')
        if(res.status == 200) {
            $('.modal').modal('hide')
            $('.modal-backdrop').remove()
            $('body').removeClass('modal-open')
            if($(this).data('callback')) {
                pushState($(this).data('callback'))
            } else {
                if(typeof table != 'undefined') {
                    table.ajax.reload
                } else {
                    handleView()
                }
            }
        } else {
            if(res.status == 422) {
                var data = await res.json()
                alert(data.message ?? 'Terdapat bidang yang kosong')
            } else {
                var data = await res.json()
                alert(data.message ?? 'Opps! terjadi kesalahan')
            }
        }
    })
}

const generateFormBody = (formData) => {
    var fd = new FormData()
    formData.forEach((val, key) => {
        fd.append(key, val)
    })

    return fd
}

const initTable = (el, columns = [], drawCallback) => {
    if (!$.fn.DataTable.isDataTable(el)) {

    }

    var opt = {
        processing: true,
        serverSide: true,
        ajax: $(el).data('url'),
        columns: columns,
        responsive: true,
        drawCallback
    }

    var table = $(el).DataTable(opt)

    table.on('draw.dt', function(){
        handleEvent()
        drawCallback
    })

    return table
}