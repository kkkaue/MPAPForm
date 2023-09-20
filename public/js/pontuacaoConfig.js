export const pontuacaoConfig = {
  curriculum_vitae: {
    curso_curta_duracao: {
      pontuacao: 0.25,
      limite: 0.50,
    },
    curso_especializacao: {
      pontuacao: 0.25,
      limite: 0.50,
    },
    diploma_mestrado: {
      pontuacao: 0.75,
      limite: 1.50,
    },
    diploma_doutorado: {
      pontuacao: 2.00,
      limite: 2.00,
    },
    aprovacao_concurso: {
      pontuacao: 0.25,
      limite: 0.75,
    },
  },
  experiencia_profissional: {
    experiencia_sistema_politicas_garantidoras_direito: {
      pontuacao: 0.25,
      limite: 2.75,
    },
    assessor_juridico:{
      pontuacao: 0.25,
      limite: 2.75,
    },
    experiencia_metodologias_atendimento:{
      pontuacao: 0.25,
      limite: 1.00,
    },
    experiencia_libras:{
      pontuacao: 0.25,
      limite: 1.00,
    }
  },
  curriculum_vitae_estagiario:{
    comprovante_matricula: {
      calcularPontuacao: (variavel = null) => {
        if (variavel === 'sim') {
          return 0.25;
        } else if (variavel === 'nao') {
          return 0.00;
        } else {
          return 0.00;
        }
      },
      limite: 0.75,
    },
    experiencia_profissional:{
      quantidade_experiencia: calcularPontuacaoQuantidadeExperienciaProfissional,
      duracao_experiencia: calcularPontuacaoDuracaoExperienciaProfissional
    },
    trabalhos_voluntarios: {
      quantidade_experiencia: calcularPontuacaoQuantidadeExperienciaProfissional,
      duracao_experiencia: calcularPontuacaoDuracaoExperienciaProfissional
    }
  }
}