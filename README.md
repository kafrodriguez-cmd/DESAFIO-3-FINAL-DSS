# DESAFIO-3-FINAL-DSS
## DataAuditLabs - Desafío 3-L

 📋 Descripción del Proyecto

DataAuditLabs es el proyecto desarrollado como solución al Desafío 3-L de Auditoría de Datos.

Se realizó un proceso completo de auditoría de datos: exploración, limpieza, validación de calidad, detección de anomalías y generación de insights con recomendaciones de control interno y mejora de gobernanza de datos.


 🎯 Objetivos Cumplidos

- Analizar la calidad de los datos recibidos
- Identificar problemas de integridad, consistencia, completitud y exactitud
- Detectar posibles riesgos, errores o indicios de fraude
- Generar hallazgos relevantes y recomendaciones accionables
- Documentar todo el proceso de forma clara y reproducible


 🛠️ Tecnologías Utilizadas

- **Python** (lenguaje principal)
- **Pandas** y **NumPy** para manipulación de datos
- **Matplotlib**, **Seaborn** y **Plotly** para visualizaciones
- **Jupyter Notebooks** para el desarrollo
- **Great Expectations** (Data Quality Testing)
- **Scikit-learn** (detección de anomalías)
- **Power BI** (Dashboard final)



 📁 Estructura del Proyecto

 DataAuditLabs/
├── data/                       
├── notebooks/
│   ├── 01_Exploracion_Inicial.ipynb
│   ├── 02_Limpieza_y_Transformacion.ipynb
│   ├── 03_Validacion_Calidad.ipynb
│   ├── 04_Deteccion_Anomalias.ipynb
│   └── 05_Analisis_Final.ipynb
├── reports/                       
├── scripts/                       
├── requirements.txt
├── README.md
└── main.py



 ### Cómo se Resolvió el Problema

 1. Exploración Inicial (EDA)
- Análisis de estructura, tipos de datos y estadísticas descriptivas
- Identificación de valores nulos, duplicados y outliers

 2. Limpieza y Estandarización
- Corrección de formatos (fechas, valores numéricos, texto)
- Tratamiento de valores faltantes
- Normalización de categorías y eliminación de duplicados

 3. Validación de Calidad de Datos
- Implementación de reglas de negocio
- Pruebas automatizadas de calidad
- Métricas: completitud, unicidad, validez y consistencia

 4. Detección de Anomalías
- Métodos estadísticos (Z-Score e IQR)
- Modelo de Machine Learning: **Isolation Forest**
- Análisis de patrones sospechosos (montos, fechas, frecuencias)

 5. Hallazgos Principales
- **[Inserta aquí tus hallazgos más importantes]**
- Alto porcentaje de registros con información incompleta
- Inconsistencias en fechas y montos
- Posibles transacciones atípicas detectadas (X casos)
- Etc.

 6. Recomendaciones
- Implementar validaciones en el punto de captura de datos
- Automatizar controles de calidad periódicos
- Crear dashboard de monitoreo continuo
- Capacitación al equipo en buenas prácticas de registro de información


 ##  Cómo Ejecutar el Proyecto

1. Clonar o descargar el proyecto
2. Instalar las dependencias:
   ```bash
   pip install -r requirements.txt
