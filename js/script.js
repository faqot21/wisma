// const selectBtn = document.querySelectorAll(".select-btn"),
//         items = document.querySelectorAll(".item");



// selectBtn.addEventListener("click", () => {
//     selectBtn.classList.toggle("open");
// });

const selectBtn = document.querySelector(".select-btn"),
    items = document.querySelectorAll(".item");

selectBtn.addEventListener("click", () => {
    selectBtn.classList.toggle("open");
    items.forEach(item => {
        item.classList.toggle("open");
    })
})
