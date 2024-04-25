"use strict";

/**
 * Updates the <textarea> element height to match it's content.
 * 
 * @param {HTMLTextAreaElement} textarea 
 * @param {number} minHeight 
 */
function updateTextAreaHeight(textarea, minHeight) {
    textarea.style.height = `${minHeight}rem`;
    textarea.style.height = `${textarea.scrollHeight}px`;
}

/*
 * Resize every <textarea> to automatically match it's content.
 */
const textareas = document.getElementsByTagName("textarea");
for (const textarea of textareas) {
    const minHeight = textarea.rows + 1;

    updateTextAreaHeight(textarea, minHeight);
    textarea.addEventListener("input", () => {
        updateTextAreaHeight(textarea, minHeight);
    });
}