
$(document).ready(function() {
    $(".solution").on("click", function (event) {
        event.preventDefault();
        let imageUrl = $('.image').attr('src');
        let csrfToken = $('meta[name="csrf-token"]').attr("content");
        let url = $(this).attr('href');
        let solution = $(this).data('solution');
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: {url: imageUrl, is_solution: solution, _csrf: csrfToken},
        }).done(function (data) {
            $('.image').attr('src', data.url);
        })

    });
});