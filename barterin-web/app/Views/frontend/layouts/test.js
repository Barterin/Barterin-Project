const loadFile = function (url, keep = !1) {
    return new Promise((resolve, reject) => {
        const format = url.split(".").pop();
        if ("js" == format) {
            const script = document.createElement("script");
            return script.setAttribute("defer", ""), 0 == keep && script.setAttribute("temp", ""), script.src = `${url}${0==keep?`?${+new Date}`:""}`, script.addEventListener("load", (function () {
                resolve(!0)
            })), document.head.appendChild(script)
        }
        if ("css" == format) {
            const link = document.createElement("link");
            link.rel = "stylesheet", link.type = "text/css", link.href = url, link.addEventListener("load", (function () {
                return resolve(!0)
            })), document.head.appendChild(link)
        }
    })
};
let sc;
const loadFiles = function (arrayJs, keep = !1) {
        return new Promise((resolve, reject) => {
            let total = arrayJs.length,
                current = 0;
            arrayJs.forEach((async function (url) {
                await loadFile(url, keep), current++, total == current && resolve(!0)
            }))
        })
    },
    redirect = function (url) {
        window.location.replace(url)
    };
let currentPage = location.href;
setInterval((function () {
    currentPage.replace(/#/g, "") != location.href.replace(/#/g, "") && (currentPage = location.href, loadPage(currentPage, !0))
}), 200);
const socketUrl = document.querySelector('meta[name="socket-url"]').getAttribute("content"),
    apiUrl = document.querySelector('meta[name="api-url"]').getAttribute("content"),
    baseUrl = document.querySelector('meta[name="base-url"]').getAttribute("content"),
    detectLoadJs = function (source = document) {
        const tempScript = document.querySelectorAll("script[temp]");
        tempScript.forEach((element, index) => {
            element.remove()
        });
        const result = source.evaluate("//*[starts-with(name(),'loadjs-')]", source, null, XPathResult.ANY_TYPE, null);
        let nodes = [],
            anode = null;
        for (; anode = result.iterateNext();) nodes.push(anode);
        nodes.forEach((value, index) => {
            loadFile(`/assets/js/page/${value.localName.split("-")[1]}.js`), value.remove()
        })
    },
    loadPage = function (url, change = !1) {
        if (url == currentPage && 0 == change) return;
        if ("#" == url) return;
        currentPage = url;
        const e = $(`a.menu-item[href='${url.trim()}']`);
        0 == change && window.history.pushState("", window.title, url), $.ajax({
            url: url,
            headers: {
                "Load-From-Ajax": !0
            },
            success: function (data) {
                $("#contentId").html($(data).filter("section#contentId").html()), detectLoadJs(), $(".webTitle").html($(data).filter("title").text())
            }
        }).fail((function (err) {
            $("#contentId").html(`<div class="container">${err.statusText}</div>`), errorCode(err)
        })).done((function () {}))
    },
    disableButton = function () {
        $(":submit").append(' <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'), $(":submit").attr("disabled", !0)
    },
    enableButton = function () {
        $(":submit").find("span").remove(), $(":submit").removeAttr("disabled")
    },
    msgSweetError = function (pesan, options = {
        title: "Error",
        timer: 3e3
    }) {
        return Swal.fire({
            icon: "error",
            html: pesan,
            title: options.title,
            timer: options.timer,
            timerProgressBar: !0
        })
    },
    msgSweetSuccess = function (pesan, options = {
        title: "Sukses",
        timer: 3e3
    }) {
        return Swal.fire({
            icon: "success",
            html: pesan,
            title: options.title,
            timer: options.timer,
            timerProgressBar: !0
        })
    },
    msgSweetWarning = function (pesan, options = {
        title: "Peringatan",
        timer: 3e3
    }) {
        return Swal.fire({
            icon: "warning",
            html: pesan,
            title: options.title,
            timer: options.timer,
            timerProgressBar: !0
        })
    },
    msgSweetInfo = function (pesan, options = {
        title: "Informasi",
        timer: 3e3
    }) {
        return Swal.fire({
            icon: "info",
            html: pesan,
            title: options.title,
            timer: options.timer,
            timerProgressBar: !0
        })
    },
    confirmSweet = function (pesan, options = {
        title: "Konfirmasi",
        confirmBtn: "Ya",
        cancelBtn: "Tidak"
    }) {
        return Swal.fire({
            icon: "warning",
            title: options.title,
            html: pesan,
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: options.confirmBtn,
            cancelButtonText: options.cancelBtn
        })
    },
    isConfirmed = function (sweetResult) {
        return 1 == sweetResult.isConfirmed
    },
    validate = function (data) {},
    selectInput = function (params) {
        Object.values(params).some(item => ($("[name=" + item.input + "].is-invalid").select(), 0 == item.valid))
    };
loadFiles([`${baseUrl}/assets/bootstrap/css/bootstrap.css`, `${baseUrl}/assets/bootstrap/js/bootstrap.bundle.min.js`, `${baseUrl}/assets/plugins/jquery/jquery.min.js`, `${baseUrl}/assets/plugins/sweetalert2/sweetalert2.css`, `${baseUrl}/assets/plugins/sweetalert2/sweetalert2.min.js`, `${socketUrl}/socket.io/socket.io.js`], !0).then((function () {
    sc = io(socketUrl), detectLoadJs(), $(document).ready((function () {})), $("a").click((function (e) {
        e.preventDefault();
        const url = $(this).attr("href");
        loadPage(url)
    }))
}));