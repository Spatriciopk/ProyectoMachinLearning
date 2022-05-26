import re
import pandas as pd
from pandas import *

from pyodide.http import open_url


def importacion_columnas(columna):
        url = "https://raw.githubusercontent.com/Freddy8-C/Proyecto_MachineLearning/master/csv/Proyecto.csv"
        data = pd.read_csv(open_url(url))
        columna = data[columna].tolist()
        return columna

