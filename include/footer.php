
    <!-- footer part -->
    <footer id="footer">
        <section id="kontakti">
            <img src="images/logo2.png">
            <h1>Kontakti</h1>
            <p>P&#235rmes aplikimit online.<br>Ose numrit t&#235 telefonit: <b>+38344999000</b></p>
        </section>
    </footer>
    <!-- end of footer part -->
</body>
<script src="jquery-3.6.0.js"></script>
<script src="slick.min.js"></script>
<script src="jquery.validate.min.js"></script>
<script>
    $().ready(function() {
        $("#login").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                fjalekalimi: {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                fjalekalimi: {
                    required: "Ju lutem shkruani nje password",
                    minlength: "Passwordi juaj duhet ti kete se paku 6 karaktere"
                },
                email: {
                    required: "Ju lutem shkruani nje emaiil",
                    email: "Ju lutem shkruani nje email address valide"
                }
            }
        });
        $("#pacienti").validate({
            rules: {
                emri: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                mbiemri: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                telefoni: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                qyteti: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                dataelindjes: {
                    required: true
                }
            },
            messages: {
                emri: {
                    required: "Ju lutem shenoni emrin",
                    minlength: "Emri i juaj duhet te kete se paku tre karaktere",
                    lettersonly: "Emri nuk duhet te kete numra "
                },
                mbiemri: {
                    required: "Ju lutem shenoni mbiemrin",
                    minlength: "Mbiemri i juaj duhet te kete se paku tre karaktere",
                    lettersonly: "Mbiemri nuk duhet te kete numra "
                },
                telefoni: {
                    required: "Ju lutem shenoni numrin e telefonit"
                },
                email: {
                    required: "Ju lutem shenoni emailin",
                    email: "Ju lutem shenoni email address valide"
                },
                qyteti: {
                    required: "Ju lutem shenoni qytetin",
                    minlength: "Qyteti i juaj duhet te kete se paku 3 karaktere",
                    lettersonly: "Qyteti nuk duhet te kete numra "
                },
                dataelindjes: {
                    required: "Ju lutem caktoni daten e lindjes"
                }
            }
        });
		$("#kontrolla").validate({
			rules: {
				emriPacientit: {
					required: true
				},
				emriMjekut: {
					required: true
				},
				emriKontrolles: {
					required: true
                },
                dataekontrolles: {
					required: true
				},
				pershkrimi: {
					required: true,
                    minlength: 5
				}
			},
			messages: {
                emriPacientit: {
					required: "Ju lutem zgjedhni pacientin"
				},
				emriMjekut: {
					required: "Ju lutem zgjedhni mjekun"
				},
				emriKontrolles: {
					required: "Ju lutem zgjedhni kontrollen"
                },
                dataekontrolles: {
					required:  "Ju lutem caktoni daten e kontrolles"
				},
				pershkrimi: {
					required: "Ju lutem shkruani nje pershkrim",
					minlength: "Pershkrimi i punes duhet ti kete se paku 5 shkronja"
				}
			}
		});
		$("#analiza").validate({
			rules: {
				emri: {
					required: true,
					minlength: 10
				},
				qmimi: {
					required: true,
				}
			},
			messages: {
				emri: {
					required: "Ju lutem shenoni emrin e analizes",
					minlength: "Emri i analizes duhet ti kete se paku 10 shkronja"
				},
				qmimi: {
					required: "Ju lutem shkruani nje qmim"
                }
			}
		});
        $("#signup").validate({
            rules: {
                emri: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                mbiemri: {
                    required: true,
                    minlength: 3,
                    lettersonly: true
                },
                telefoni: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                fjalekalimi: {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                emri: {
                    required: "Ju lutem shenoni emrin",
                    minlength: "Emri i juaj duhet te kete se paku tre karaktere",
                    lettersonly: "Emri nuk duhet te kete numra "
                },
                mbiemri: {
                    required: "Ju lutem shenoni mbiemrin",
                    minlength: "Mbiemri i juaj duhet te kete se paku tre karaktere",
                    lettersonly: "Mbiemri nuk duhet te kete numra "
                },
                telefoni: {
                    required: "Ju lutem shenoni numrin e telefonit"
                },
                email: {
                    required: "Ju lutem shenoni emailin",
                    email: "Ju lutem shenoni email address valide"
                },
                fjalekalimi: {
                    required: "Ju lutem shkruani nje password",
                    minlength: "Passwordi juaj duhet ti kete se paku 6 karaktere"
                }
            }
        });
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z]+$/i.test(value);
        }, "Letters only please");
	});
    $("#mesazhi").fadeOut(8000,function(){
        $.ajax({
            url: '?argument=mesazhi',
        });
    });
    $('#dalja').click(function(){
        $.ajax({
            url: '?argument=dalja',
            success: function(data) {
                window.location.href = 'index.php';
            }
        });
	});
</script>

</html>