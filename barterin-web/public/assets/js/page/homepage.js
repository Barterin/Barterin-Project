// alert("jhgfvx")

function initSlick(params) {
    $(".barter-slider").slick({
        dots: false,
        infinite: true,
        speed: 300,
        arrows: true,
        slidesToShow: 8,
        slidesToScroll: 1,
        swipe: true,
        swipeToSlide: true, // You can unslick at a given breakpoint now by adding:
    });
}

$(document).ready(function () {
    $.ajax({
        url: `${apiUrl}/public/items/barter`,
        method: "get",
        data: {
            skip: 0,
            take: 5,
        },
        dataType: "JSON",
        success: function (e) {
            if (e.statusCode == 200) {
                let html = "";
                const data = e.data;
                data.forEach((element) => {
                    const image = element.item.image;
                    const item = element.item;
                    // console.log(image);
                    html += `
                      <div class="card item-card m-1 col-1" aria-hidden="true" style="width: 10rem; max-height: 15rem;">
                        <img src="${image[0]}" class="card-img-top img img-fluid" alt="">
                        <div class="card-body">
                            <h5 class="card-title placeholder-glow">
                                <span class="placeholder col-6 bg-dark"></span>
                                ${item.name}
                            </h5>
                            <p class="card-text placeholder-glow">
                                <i class="placeholder col-7 bi bi-geo-alt-fill"></i>
                                <span class="placeholder col-7">${item.address_region}</span>
                            </p>
                        </div>
                    </div>
                    `;
                });
                $(`#barterSliderItems`).html(html);
            }
        },
    }).done(() => {
        initSlick();
    });
});
