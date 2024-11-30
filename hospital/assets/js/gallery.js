document.querySelectorAll(".thumbnails input").forEach((input) => {
  input.addEventListener("change", function () {
    const selectedImage = this.id.replace("img-tab-", ""); // Extract the number from the id
    const bigImage = document.getElementById("big-image");

    // Update the big image background based on the selected thumbnail
    switch (selectedImage) {
      case "1":
        bigImage.style.backgroundImage = "url(assets/images/g1.jpg)";
        break;
      case "2":
        bigImage.style.backgroundImage = "url(assets/images/g2.webp)";
        break;
      case "3":
        bigImage.style.backgroundImage = "url(assets/images/g3.jpg)";
        break;
      case "4":
        bigImage.style.backgroundImage = "url(assets/images/g4.jpg)";
        break;
      case "5":
        bigImage.style.backgroundImage = "url(assets/images/g5.jpg)";
        break;
      case "6":
        bigImage.style.backgroundImage = "url(assets/images/g6.jpg)";
        break;
      case "7":
        bigImage.style.backgroundImage = "url(assets/images/g7.jpg)";
        break;
      case "8":
        bigImage.style.backgroundImage = "url(assets/images/g8.webp)";
        break;
    }
  });
});
