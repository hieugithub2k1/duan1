

function checkdel(url){
    var popupContainer = document.getElementById("popupContainer");
    popupContainer.style.display = "block";
    document.getElementById("popupOk").onclick = function() {
        window.location.href = url; // Chuyển hướng đến linkUrl khi người dùng nhấn OK
        popupContainer.style.display = "none"; // Ẩn cửa sổ popup sau khi chuyển hướng
    };
    document.getElementById("popupCancel").onclick = function() {
        popupContainer.style.display = "none"; // Đóng cửa sổ popup khi người dùng nhấn Cancel
    };
    return false;
}



