const ToggleBtn = document.querySelector(".toggle-btn");
const SideBar = document.querySelector("#sidebar");
const Main = document.querySelector("#main");
const ProfileBtn = document.querySelector(".profile");
const TabProfile = document.querySelector(".tab-profile");
const DropdownSidebarBtns = document.querySelectorAll(".tab-drop-btn");
const DropdownSidebarELements = document.querySelectorAll(".tab-dropdown");
const Loader = document.querySelector(".loader");

window.addEventListener("load", function () {
  Loader.classList.add("hide");
});

ToggleBtn.addEventListener("click", function () {
  SideBar.classList.toggle("s-active");
  Main.classList.toggle("m-active");
});

ProfileBtn.addEventListener("click", function () {
  TabProfile.classList.toggle("profile-active");
});

DropdownSidebarBtns.forEach((DropdownSidebarBtn, index) => {
  DropdownSidebarBtn.addEventListener("click", function () {
    DropdownSidebarBtn.classList.toggle("d-side-active");
    const dropdownElement = DropdownSidebarBtn.nextElementSibling;

    if (DropdownSidebarBtn.classList.contains("d-side-active")) {
      dropdownElement.style.height = dropdownElement.scrollHeight + "px";
      dropdownElement.addEventListener(
        "transitionend",
        function handleTransitionEnd() {
          dropdownElement.style.height = "auto";
          dropdownElement.removeEventListener(
            "transitionend",
            handleTransitionEnd
          );
        }
      );
    } else {
      dropdownElement.style.height = dropdownElement.scrollHeight + "px";
      dropdownElement.offsetHeight;
      dropdownElement.style.height = "0px";
    }
  });
});
