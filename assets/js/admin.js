var appAdmin = new Vue({
	el: "#appAdmin",
	data: {
		mensaje: "Bienvenido",
		vista: 0,

		capitulos: [],
		listaLeyes: [],
		btnLey: false,
		btnLeyd: false,
		idLey: "",
		idLeyd: "",
		fley: {
			nombre: null,
			descripcion: null
		},
		fleyd: {
			nombre: null,
			descripcion: null,
			ponderacion: null
		},


		btnEmp: false,
		idEmp: "",
		listaEmp: [],

		btnSol: false

	},
	methods: {
		cambiarVista(valor) {
			this.vista = valor

			if (valor == 1) {
				this.reiniciarLey()
				this.buscarLey()
			}

			if (valor == 2) {
				this.buscarEmpresa()
			}
		},
		reiniciarLey() {
			this.capitulos = []
			this.btnLey = false
			this.idLey = ""
			this.idLeyd = ""
			this.fley = {
				nombre: null,
				descripcion: null
			}
			this.fleyd = {
				nombre: null,
				descripcion: null,
				ponderacion: null
			}
		},
		guardarLey() {
			if (confirm("¿Está seguro de guardar la ley?")) {
				this.btnLey = true

				axios
				.post("ley/guardar/"+this.idLey, this.fley)
				.then(res => {
					if (res.data.exito) {
						if (this.idLey) {
							let tmp = this.listaLeyes.filter(e => {
								return e.id == this.idLey
							})[0]

							tmp.nombre = res.data.reg.nombre
							tmp.descripcion = res.data.reg.descripcion

						} else {
							this.listaLeyes.push(res.data.reg)
						}
					}

					this.reiniciarLey()

				}).catch(e => {
					alert(e)
					this.btnLey = false
				})

			}
		},
		guardarLeyd() {
			if (confirm("¿Está seguro de guardar?")) {
				this.btnLeyd = true

				axios
				.post("ley/guardar_detalle/"+this.idLeyd, this.fleyd)
				.then(res => {

					this.btnLeyd = false
					let tmp = this.listaLeyes.filter(e => {
						return e.id == this.idLey
					})[0]

					let idx = this.listaLeyes.indexOf(tmp)
					
					this.listaLeyes[idx] = res.data.reg
					this.capitulos = res.data.reg.capitulos

					let miModal = new bootstrap.Modal(document.getElementById('leyModal'));
					miModal.hide();

				}).catch(e => {
					alert(e)
					this.btnLeyd = false
				})

			}
		},
		buscarLey() {
			axios
			.get("ley/buscar")
			.then(res => {
				this.listaLeyes = res.data
			}).catch(e => {
				alert(e)
			})
		},
		verLey(obj, idx) {
			this.fley.nombre = obj.nombre
			this.fley.descripcion = obj.descripcion
			this.idLey = obj.id
			this.capitulos = obj.capitulos
		},
		abrirModal(tipo, accion, obj) {
			let miModal = new bootstrap.Modal(document.getElementById('leyModal'));
			miModal.show();

			if (accion == 1) {
				this.idLeyd = ""
				this.fleyd = {
					titulo: null,
					descripcion: null,
					ponderacion: null,
					ley_id: this.idLey
				}
			}  else {
				this.idLeyd = obj.id
				this.fleyd.titulo = obj.titulo
				this.fleyd.descripcion = obj.descripcion
				this.fleyd.ponderacion = obj.ponderacion
				this.fleyd.ley_id = this.idLey
			}

			if (tipo == 0) {
				document.getElementById("staticBackdropLabel").innerHTML = "Nuevo capitulo"
			} else if (tipo == 1) {
				document.getElementById("staticBackdropLabel").innerHTML = "Agregar artículo a " + obj.titulo
				this.fleyd.parent = obj.id
			} else if (tipo == 2){
				document.getElementById("staticBackdropLabel").innerHTML = "Editar Artículo " + obj.titulo
			} else if (tipo == 3){
				document.getElementById("staticBackdropLabel").innerHTML = "Editar capitulo " + obj.titulo
			}
		},

		guardarEmpresa(e) {
			if (confirm("¿Está seguro de guardar la empresa?")) {
				this.btnEmp = true
				let datos = new FormData(e.target)

				axios
				.post("empresa/guardar/"+this.idEmp, datos)
				.then(res => {
					if (res.data.exito) {
						if (this.idEmp) {
							let tmp = this.listaEmp.filter(e => {
								return e.id == this.idEmp
							})[0]

							let idx = this.listaEmp.indexOf(tmp)
							this.listaEmp[idx] = res.data.reg

						} else {
							this.listaEmp.push(res.data.reg)
						}

						e.target.reset()
					}

					this.btnEmp = false

				}).catch(e => {
					alert(e)
					this.btnEmp = false
				})

			}
		},
		buscarEmpresa() {
			axios
			.get("empresa/buscar")
			.then(res => {
				this.listaEmp = res.data
			}).catch(e => {
				alert(e)
			})
		},
		verEmpresa(obj) {
			this.idEmp = obj.id

			document.getElementById("nombre").value = obj.nombre
			document.getElementById("direccion").value = obj.direccion
			document.getElementById("identificacion").value = obj.identificacion
			document.getElementById("telefono").value = obj.telefono
			document.getElementById("representante").value = obj.representante
		},
		guardarSolicitud(e) {
			if (confirm("¿Está seguro de guardar la evaluación?")) {
				this.btnSol = true
				let datos = new FormData(e.target)

				axios
				.post("solicitud/guardar/", datos)
				.then(res => {
					if (res.data.exito) {
						e.target.reset()
					}

					alert(res.data.mensaje)

					this.btnSol = false

				}).catch(e => {
					alert(e)
					this.btnSol = false
				})

			}
		}
	}
})