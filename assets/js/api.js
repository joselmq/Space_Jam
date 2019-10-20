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

        console.log(data);
        
        document.getElementById("pieza1").src = await data.images[0];
        document.getElementById("pieza2").src = await data.images[1];
        document.getElementById("pieza3").src = await data.images[2];
        document.getElementById("pieza4").src = await data.images[3];
        document.getElementById("answerImage").src = await data.originalImage;

        let details = await data.info
        details.originalImage = await data.originalImage

        setDetails(details)

        document.getElementById("captchingForThePlanet").style.display = "block";
    } catch (error) {
        console.error(error);
    }
}