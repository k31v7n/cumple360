var login = new Vue({
	el: "#appLogin",
	data: {
		iniciando: false,
		mensaje: null,
		form: {
			alias: null,
			clave: null
		}
	},
	methods: {
		login() {
			this.iniciando = true
			this.mensaje = null
			
			axios
			.post("sesion/login", this.form)
			.then(res => {
				this.iniciando = false
				
				if (res.data.exito) {
					window.location.href = "principal"
				} else {
					this.mensaje = res.data.mensaje
				}

			}).catch(e => {
				this.mensaje = e
				this.iniciando = false
			})
		}
	}
})