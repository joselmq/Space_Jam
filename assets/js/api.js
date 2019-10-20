function setDetails(details) {
    localStorage.setItem("infoImage", JSON.stringify(details));
}

function getDetails() {
    // Retrieve the object from storage
    var retrievedObject = localStorage.getItem('infoImage');

    return JSON.parse(retrievedObject)
}

// Want to use async/await? Add the `async` keyword to your outer function/method.
async function getImage() {
    try {
        const {
            data
        } = await axios.get('http://54.144.195.125:8010/api/getImage');

        let arr = [1, 2, 3, 4];
        
        const shuffle = ([...arr]) => {
            let m = arr.length;
            while (m) {
                const i = Math.floor(Math.random() * m--);
                [arr[m], arr[i]] = [arr[i], arr[m]];
            }
            return arr;
        };

        arr = shuffle(arr);
        
        let html = `
            <img id="pieza${arr[0]}" src="" alt="pieza${arr[0]}" draggable="true" ondragstart="start(event)" ondragend="end(event)">
            <img id="pieza${arr[1]}" src="" alt="pieza${arr[1]}" draggable="true" ondragstart="start(event)" ondragend="end(event)">
            <img id="pieza${arr[2]}" src="" alt="pieza${arr[2]}" draggable="true" ondragstart="start(event)" ondragend="end(event)">
            <img id="pieza${arr[3]}" src="" alt="pieza${arr[3]}" draggable="true" ondragstart="start(event)" ondragend="end(event)">
        `;
        
        document.getElementById("containerParts").innerHTML = html

        document.getElementById("pieza1").src = await data.images[0];
        document.getElementById("pieza2").src = await data.images[1];
        document.getElementById("pieza3").src = await data.images[2];
        document.getElementById("pieza4").src = await data.images[3];
        document.getElementById("answerImage").src = await data.originalImage;

        let details = data.info
        details.originalImage = data.originalImage
        details.url_project = data.url_project

        setDetails(details)

        document.getElementById("captchingForThePlanet").style.display = "block";
    } catch (error) {
        console.error(error);
    }
}