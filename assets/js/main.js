document.addEventListener("DOMContentLoaded", (event) => {
  const div = document.createElement("div");

  div.className = "oxygen-editor-currently-editing";

  div.innerHTML = current_entry.name;

  document
    .querySelector("#oxygen-topbar")
    .insertBefore(div, document.querySelector(".oxygen-undo-redo-menus"));
});
