

function CallAPI(datareq,func) {
    url = "http://localhost/duan1/api";
    const Options = {
        method: "post",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(datareq)
    };

    fetch(url, Options)
        .then(res => { return res.json() })
        .then(data => {
            console.log(data);
            func(data);
        })
        .catch(err => { console.log("catch: -> ", err) })

}


function showChapter() {
    const Esubject = document.getElementById('subject');
    const Eclass = document.getElementById('class');
    if (Esubject.value != '' && Eclass.value != '') {
        const dataapi = {
            name: "chapter",
            idclass: Eclass.value,
            idsubject: Esubject.value
        }
        CallAPI(dataapi,showChapter_run);
    }
}

function showChapter_run(data) {
    const chapter = document.getElementById('chapter');
    const option = document.querySelectorAll('#chapter option + option');
    if (option.length > 0) {
        option.forEach(item => {
            item.remove();
        })
    }

    if (data.length > 0) {
        data.forEach(item => {
            const temp = document.createElement("option");
            temp.value = item.id;
            temp.textContent = item.name;
            chapter.appendChild(temp);
        })
    } else {
        const temp = document.createElement("option");
        temp.textContent = "Bạn chưa có chương học nào";
        temp.disabled = true;
        chapter.appendChild(temp);
    }
}


