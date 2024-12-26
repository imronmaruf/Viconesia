// import "./bootstrap";
import "@tabler/icons-webfont/dist/tabler-icons.css";

// Import SweetAlert2
import Swal2 from "sweetalert2";
window.Swal2 = Swal2;

// Import Quill
import Quill from "quill";
import "quill/dist/quill.snow.css";

// Import DataTables
import "datatables.net-bs5/css/dataTables.bootstrap5.min.css";
import DataTable from "datatables.net-bs5";

// Inisialisasi Quill
document.addEventListener("DOMContentLoaded", function () {
    const editorElement = document.querySelector("#editor");
    if (editorElement) {
        var quill = new Quill("#editor", {
            theme: "snow",
            modules: {
                toolbar: [
                    [
                        {
                            header: [1, 2, 3, 4, 5, 6, false],
                        },
                    ],
                    [
                        {
                            font: [],
                        },
                    ],
                    ["bold", "italic", "underline", "strike"],
                    ["blockquote", "code-block"],
                    [
                        {
                            list: "ordered",
                        },
                        {
                            list: "bullet",
                        },
                    ],
                    [
                        {
                            script: "sub",
                        },
                        {
                            script: "super",
                        },
                    ],
                    [
                        {
                            indent: "-1",
                        },
                        {
                            indent: "+1",
                        },
                    ],
                    [
                        {
                            direction: "rtl",
                        },
                    ],
                    [
                        {
                            size: ["small", false, "large", "huge"],
                        },
                    ],
                    [
                        {
                            color: [],
                        },
                        {
                            background: [],
                        },
                    ],
                    [
                        {
                            align: [],
                        },
                    ],
                    ["link"],
                    ["clean"],
                ],
            },
            placeholder: "Tulis konten blog disini...",
        });

        // Muat konten yang sudah ada (untuk halaman edit)
        const hiddenInput = document.getElementById("content");
        if (hiddenInput && hiddenInput.value) {
            quill.root.innerHTML = hiddenInput.value;
        }

        //  handler form submit
        const form = document.getElementById("blogForm");
        if (form) {
            form.onsubmit = function () {
                // ambil konten di editor
                const content = document.getElementById("content");
                // Set  content value sebelum di submit
                content.value = quill.root.innerHTML;
                return true;
            };
        }
    }
});

// Inisialisasi DataTable
document.addEventListener("DOMContentLoaded", () => {
    const table = document.querySelector("#dataTable");
    if (table) {
        new DataTable(table);
    }
});
