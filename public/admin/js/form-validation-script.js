var Script = function () {

    // $.validator.setDefaults({
    //     submitHandler: function() { alert("submitted!"); }
    // });

    $().ready(function() {
        // validate the comment form when it is submitted
        // $("#commentForm").validate();

        // validate signup form on keyup and submit
        $("#admin").validate({
            rules: {
                noi: "required",
                name: "required",
                position_id : "required",
                tahun : "required",
                firstname: "required",
                lastname: "required",
                username: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 6
                },
                password_confirmation: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                noi: "Masukkan nomor identitas",
                name: "Masukkan nama lengkap",
                position_id: "Pilih jabatan",
                tahun: "Pilih tahun menjabat",
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password: {
                    required: "Masukkan Password",
                    minlength: "Password minimal 6 digit"
                },
                password_confirmation: {
                    required: "Masukkan Password",
                    minlength: "Password minimal 6 digit",
                    equalTo: "Masukkan Password yang sama"
                },
                email: "Masukkan email yang benar",
                agree: "Setujui persyaratan dengan mencentang"
            }
        });

        $("#regis").validate({
            rules: {
                jenjang: "required",
                name: "required",
                adstreet : "required",
                advillage : "required",
                addistricts: "required",
                adcity: "required",
                adpostalcode: {
                    required: true,
                    minlength: 5,
                    maxlength: 5,
                    digits: true
                },
                adphone: {
                    required: true,
                    minlength: 7,
                    maxlength: 10,
                    digits: true
                },
                hmname: "required",
                hmphone: {
                    minlength: 7,
                    maxlength: 10,
                    digits: true
                },
                hmmobile: {
                    required: true,
                    minlength: 10,
                    maxlength: 12,
                    digits: true
                },
                username: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 6
                },
                // password_confirmation: {
                //     required: true,
                //     minlength: 6,
                //     equalTo: "#password"
                // },
                email: {
                    required: true,
                    email: true
                },
                syarat: "required",
            },
            messages: {
                jenjang: "Pilih Jenjang",
                name: "Masukkan Nama Sekolah",
                adstreet : "Masukkan Nama Jalan",
                advillage : "Masukkan Nama Desa",
                addistricts: "Masukkan Nama Kecamatan",
                adcity: "Masukkan Nama Kota/Kabupaten",
                adpostalcode: {
                    required: "Masukkan Kode Pos",
                    digits: "Kode Pos Harus Angka",
                    minlength: "Kode Pos Harus 5 Digit",
                    maxlength: "Kode Pos Harus 5 Digit"
                },
                adphone: {
                    required: "Masukkan Nomor Telepon Sekolah",
                    minlength: "Nomor Telepon Minimal 6 Digit",
                    maxlength: "Nomor Telepon Maksimal 10 Digit",
                    digits: "Nomor Telepon Harus Angka"
                },
                hmname: "Masukkan Nama Kepala Sekolah",
                hmphone: {
                    required: "Masukkan Nomor Telepon",
                    minlength: "Nomor Telepon Minimal 6 Digit",
                    maxlength: "Nomor Telepon Maksimal 10 Digit",
                    digits: "Nomor Telepon Harus Angka"
                },
                hmmobile: {
                    required: "Masukkan Nomor Handphone",
                    minlength: "Nomor Telepon Minimal 10 Digit",
                    maxlength: "Nomor Telepon Maksimal 12 Digit",
                    digits: "Nomor Handphone Harus Angka"
                },
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
                password: {
                    required: "Masukkan Password",
                    minlength: "Password minimal 6 digit"
                },
                // password_confirmation: {
                //     required: "Masukkan Password",
                //     minlength: "Password minimal 6 digit",
                //     equalTo: "Masukkan Password yang sama"
                // },
                email: "Masukkan email yang benar",
                syarat: "Setujui persyaratan dengan mencentang",
            }
        });

        $("#formulir").validate({
            rules: {
                name: "required",
                nis : "required",
                tmptlhr : "required",
                tgllhr: "required",
                jenjang: "required",
                foto: "required",
                rapor:"required"
            },
            messages: {
                name: "Masukkan nama lengkap",
                nis : "Masukkan nomor induk siswa",
                tmptlhr : "Masukkan tempat lahir",
                tgllhr: "Masukkan tanggal lahir",
                jenjang: "Pilih salah satu jenjang",
                foto: "Harus ada foto",
                rapor:"Harus ada file rapor"
            }
        });

        $("#formulire").validate({
            rules: {
                name: "required",
                nis : "required",
                tmptlhr : "required",
                tgllhr: "required",
                jenjang: "required"
            },
            messages: {
                name: "Masukkan nama lengkap",
                nis : "Masukkan nomor induk siswa",
                tmptlhr : "Masukkan tempat lahir",
                tgllhr: "Masukkan tanggal lahir",
                jenjang: "Pilih salah satu jenjang"
            }
        });

        $("#payment").validate({
            rules: {
                method: "required",
                paymentdate : "required",
                amount : {
                    required: true,
                    digits: true
                },
                attachment: "required",
            },
            messages: {
                method: "Pilih salah satu metode pembayaran",
                paymentdate : "Masukkan tanggal pembayaran",
                amount : {
                    required: "masukkan jumlah pembayaran",
                    digits: "jumlah uang harus angka tidak ada tambahan (.) titik atau (,)koma"
                },
                attachment: "Masukkan file scan/screenshoot/foto bukti pembayaran"
            }
        });

        $("#officer").validate({
            rules: {
                name: "required",
                notlp: {
                    minlength: 7,
                    maxlength: 10,
                    digits: true
                },
                nohp: {
                    required: true,
                    minlength: 10,
                    maxlength: 12,
                    digits: true
                },
                type: "required",
            },
            messages: {
                name: "Masukkan nama lengkap",
                notlp: {
                    required: "Masukkan Nomor Telepon",
                    minlength: "Nomor Telepon Minimal 6 Digit",
                    maxlength: "Nomor Telepon Maksimal 10 Digit",
                    digits: "Nomor Telepon Harus Angka"
                },
                nohp: {
                    required: "Masukkan Nomor Handphone",
                    minlength: "Nomor Telepon Minimal 10 Digit",
                    maxlength: "Nomor Telepon Maksimal 12 Digit",
                    digits: "Nomor Handphone Harus Angka"
                },
                type: "Pilih Petugas",
            }
        });

        $("#position").validate({
            rules: {
                name: "required",
            },
            messages: {
                name: "Masukkan nama jabatan",
            }
        });

        $("#sponsor").validate({
            rules: {
                name: "required",
                logo: "required",
            },
            messages: {
                name: "Masukkan nama sponsor",
                logo: "Upload logo",
            }
        });

        $("#skema").validate({
            rules: {
                seri: "required",
                nodada: "required",
                nolint: "required",
            },
            messages: {
                seri: "Pilih seri lomba",
                nodada: "Pilih nomor dada",
                nolint: "Pilih no.lint/no urut",
            }
        });

        $("#skemai").validate({
            rules: {
                tahun: "required",
                jenjang: "required",
                nocontest: "required",
            },
            messages: {
                tahun: "Pilih tahun",
                jenjang: "Pilih jenjang",
                nocontest: "Pilih lomba",
            }
        });

        $("#cetakskema").validate({
            rules: {
                tahun: "required",
                jenjang: "required",
                nocontest: "required",
                seri: "required",
                tipe: "required",
                output: "required",
            },
            messages: {
                tahun: "Pilih tahun",
                jenjang: "Pilih jenjang",
                nocontest: "Pilih lomba",
                seri: "Pilih seri",
                tipe: "Pilih tipe",
                output: "Pilih output file",
            }
        });

        $("#document").validate({
            rules: {
                name: "required",
                file: "required",
            },
            messages: {
                name: "Masukkan nama dokumen",
                file: "Pilih file",
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if(firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });


}();