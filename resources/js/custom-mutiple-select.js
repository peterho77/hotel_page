export function updateSelectedOptions(customSelect) {
    const selectedOptions = Array.from(
        customSelect.querySelectorAll(".option.active")
    )
        .filter(
            (option) =>
                option !== customSelect.querySelector(".option.all-tags")
        )
        .map(function (option) {
            return {
                value: option.getAttribute("data-value"),
                text: option.textContent.trim(),
            };
        });

    const selectedValues = selectedOptions.map(function (option) {
        return option.value;
    });

    const selectedText = selectedOptions.map(function (option) {
        return option.text;
    });

    customSelect.querySelector(".tags-input").value = selectedValues.join(",");

    let tagsHTML = "";

    if (selectedOptions.length === 0) {
        customSelect.querySelector(".selected-area .placeholder").style.display = "block";
    } else {
        const maxTagsToShow = 4;
        let additionalTagsCount = 0;

        selectedOptions.forEach(function (option, index) {
            if (index < maxTagsToShow) {
                tagsHTML +=
                    `<span class="tag">` +
                    option.text +
                    `<span class="remove-tag" data-value="` +
                    option.value +
                    `">&times;</span></span>`;
            } else {
                additionalTagsCount++;
            }
        });

        if (additionalTagsCount > 0) {
            tagsHTML += `<span class="tag">+` + additionalTagsCount + `</span>`;
        }
        customSelect.querySelector(".selected-area .placeholder").style.display = "none";
    }
    customSelect.querySelector(".selected-options").innerHTML = tagsHTML;

    return selectedText;
}

document.addEventListener("DOMContentLoaded", function () {
    const customSelects = document.querySelectorAll(".custom-select");

    customSelects.forEach(function (customSelect) {
        const options = customSelect.querySelectorAll(".option");
        const allTagsOption = customSelect.querySelector(".option.all-tags");

        allTagsOption.addEventListener("click", () => {
            const isActive = allTagsOption.classList.contains("active");

            options.forEach(function (option) {
                if (option !== allTagsOption) {
                    option.classList.toggle("active", !isActive);
                }
            });

            updateSelectedOptions(customSelect);
        });
    });

    customSelects.forEach((customSelect) => {
        const options = customSelect.querySelectorAll(".option");
        options.forEach((option) => {
            option.addEventListener("click", () => {
                option.classList.toggle("active");
                updateSelectedOptions(customSelect);
            });
        });
    });

    document.addEventListener("click", (event) => {
        let removeTag = event.target.closest(".remove-tag");
        if (removeTag) {
            const customSelect = removeTag.closest(".custom-select");
            const valueToRemove = removeTag.getAttribute("data-value");
            const optionToRemove = customSelect.querySelector(
                `.option[data-value="${valueToRemove}"]`
            );
            if (optionToRemove) {
                optionToRemove.classList.remove("active");
            }

            const otherSelectedOptions = customSelect.querySelectorAll(
                ".option.active:not(.all-tags)"
            );
            const allTagsOption =
                customSelect.querySelector(".option.all-tags");

            if (otherSelectedOptions.length === 0) {
                allTagsOption.classList.remove("active");
            }
            updateSelectedOptions(customSelect);

            customSelect.dispatchEvent(new CustomEvent("removeTagDone"));
        }
    });

    const selectBoxes = document.querySelectorAll(".select-box");
    selectBoxes.forEach((selectBox) => {
        selectBox.addEventListener("click", (event) => {
            if (!event.target.closest(".tag")) {
                selectBox.parentNode.classList.toggle("open");
            }
        });
    });
    document.addEventListener("click", (event) => {
        if (
            !event.target.closest(".custom-select") &&
            !event.target.classList.contains("remove-tag")
        ) {
            customSelects.forEach((customSelect) => {
                customSelect.classList.remove("open");
            });
        }
    });

    function resetCustomSelect() {
        customSelects.forEach((customSelect) => {
            customSelect
                .querySelectorAll(".option.active")
                .forEach((option) => {
                    option.classList.remove("active");
                });
            customSelect
                .querySelector(".option.all-tags")
                .classList.remove("active");
            updateSelectedOptions(customSelect);
        });
    }
    updateSelectedOptions(customSelects[0]);
});
