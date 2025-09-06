let appAuditor = new Vue({
	el: "#appAuditor",
	data: {
		mensaje: null,
		sol: "",
		cargando: false,
		cat: {},
		madurez: null
	},
	created() {
		this.getDatos()
	},
	methods: {
		getDatos() {
			this.sol = document.getElementById("xsolicitud").value
			this.cargando = true

			axios
			.get("../datos/"+this.sol)
			.then(res => {
				this.cargando = false
				this.cat = res.data
				this.madurez = res.data.madurez
				
			}).catch(e => {
				alert(e)
				this.cargando = false
			})
		},
		actualizar(obj) {
			if (obj.estado_id) {
				let datos = {
					avance: this.avance,
					detalle: {
						solicitud_id: this.sol,
						ley_detalle_id: obj.id,
						estado_id: obj.estado_id,
						responsable: obj.responsable,
						evidencia: obj.evidencia,
						observacion: obj.observacion,
						id: obj.evaluacion_id
					}
				}

				axios
				.post("../actualizar", datos)
				.then(res => {

					if (res.data.exito) {
						obj.evaluacion_id = res.data.reg.id
						obj.responsable = res.data.reg.responsable
						obj.evidencia = res.data.reg.evidencia
						obj.observacion = res.data.reg.observacion

						this.madurez = res.data.madurez
					}

				}).catch(e => {
					alert("actualizar" + e)
				})
			}
		},
		capCumplimiento(obj) {
			let total = 0

			obj.articulos.forEach(e => {
				if (e.estado_id == 1) {
					total += parseFloat(e.ponderacion)

				} else if (e.estado_id == 2) {
					total += parseFloat(e.ponderacion/2)

				} else if (e.estado_id == 4) {
					total += parseFloat(e.ponderacion)
				
				} else {
					total += 0
				}
				
			})

			return total.toFixed()
		}
	},
	computed: {
		avance() {
			let xtotal = 0

			if (this.cat.ley) {
				this.cat.ley.capitulos.forEach(cap => {

					let total = 0


					cap.articulos.forEach(e => {

						if (e.estado_id == 1) {
							total += parseFloat(e.ponderacion)

						} else if (e.estado_id == 2) {
							total += parseFloat(e.ponderacion/2)

						} else if (e.estado_id == 4) {
							total += parseFloat(e.ponderacion)
						
						} else {
							total += 0
						}

					})

					xtotal += parseFloat(total)
				})

				return parseFloat(xtotal).toFixed(2)
			}

			return xtotal
		},
		cumEstado() {
			let cumple   = 0
			let nocumple = 0
			let parcial  = 0
			let noaplica = 0

			if (this.cat.ley) {
				this.cat.ley.capitulos.forEach(cap => {

					cap.articulos.forEach(e => {
						if (e.estado_id == 1) {
							cumple += 1

						} else if (e.estado_id == 2) {
							parcial += 1

						} else if (e.estado_id == 4) {
							noaplica += 1
						
						} else if (e.estado_id == 3) {
							nocumple += 1
						}
					})
				})
			}

			return {
				cumple: cumple,
				nocumple: nocumple,
				parcial: parcial,
				noaplica: noaplica
			}
		}
	}
})